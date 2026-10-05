---
title: "대규모 데이터 파이프라인에서 장애에 탄력적인 아키텍처 설계하기"
category: "Architecture"
date: "2026-09-20"
tags: "ETL, Data Pipeline, Redis, Idempotency, Architecture"
summary: "네트워크 단절, 타임아웃, 중복 메시지 속에서도 데이터 정합성을 100% 보장하는 멱등성(Idempotency) 설계와 Dead Letter Queue 패턴 실무 적용기입니다."
---

## 💥 분산 시스템에서 장애는 '예외'가 아니라 '일상'이다

실시간으로 수천만 건의 데이터를 동기화하는 ETL 파이프라인을 운영하다 보면, 다음과 같은 문제는 언제든 발생합니다:

1. 데이터베이스 일시적인 락(Lock) 및 타임아웃
2. 외부 API 서버의 간헐적인 502/504 에러
3. 작업 실패 후 재시도로 인한 동일 데이터 중복 유입

---

### 1. 멱등성(Idempotency)의 필수 구현

동일한 이벤트가 2번 이상 인입되어도 결과는 항상 동일해야 합니다.

```python
# 멱등키를 활용한 분산 락 및 중복 방지 패턴 예시
def process_event(event: dict, redis_client):
    idempotency_key = f"evt_lock:{event['source_id']}:{event['timestamp']}"
    
    # 1. 10분간 원자적 락 획득 시도 (SET NX EX)
    if not redis_client.set(idempotency_key, "PROCESSING", nx=True, ex=600):
        logger.info(f"Duplicate or already processing event: {idempotency_key}")
        return {"status": "skipped", "reason": "duplicate"}
    
    try:
        # 2. 비즈니스 로직 및 DB 적재
        execute_data_transformation(event)
        redis_client.set(idempotency_key, "COMPLETED", ex=86400) # 24시간 보관
    except Exception as e:
        redis_client.delete(idempotency_key)
        raise e
```

---

### 2. Dead Letter Queue (DLQ)와 자가 치유

일시적 장애는 지수 백오프(Exponential Backoff)로 3~5회 재시도하고, 스키마 불일치 등 영구적 오류는 즉시 DLQ(실패 큐)로 격리하여 전체 파이프라인이 멈추지 않도록 설계해야 합니다.

* **격리**: 비정상 데이터가 전체 큐를 막는 현상(Head-of-Line Blocking) 방지
* **가시성**: Slack 웹훅을 통해 문제 발생 즉시 페이로드 원본과 스택 트레이스 전송
* **재처리**: 원인 해결 후 관리자 대시보드(Control Room)에서 원클릭 재실행 지원
