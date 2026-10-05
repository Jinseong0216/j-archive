---
title: "실시간 분산 ETL 데이터 파이프라인 및 모니터링 시스템"
category: "Data & Infrastructure"
order: 90
date: "2023-12-15"
period: "2023.03 - 2023.12 (10개월)"
role: "Data Platform Engineer"
tags: "Python, PHP, Docker, PostgreSQL, Redis, Kafka, Linux"
summary: "사내 분산된 15개 이상의 이기종 데이터 소스를 단일 데이터 레이크로 통합하고, 초당 2,000건의 트랜잭션을 실시간 검증·변환·적재하는 무중단 ETL 파이프라인을 구축했습니다."
github: "https://github.com/jinseong-choi/distributed-etl-pipeline"
demo: "https://etl-demo.jinseong.dev"
---

## 📌 1. 프로젝트 개요 (Overview)

ERP, MES, CRM 등 분산된 레거시 시스템들 사이에 데이터 정합성이 어긋나 정산 및 생산 분석 보고서 생성에 매번 수일이 소요되는 문제가 있었습니다. 이를 해결하기 위해 실시간 데이터 추출, 검증, 변환 및 데이터 마트 적재를 자동화하는 파이프라인을 구축했습니다.

---

## 🏗️ 2. 핵심 아키텍처 및 구현 내용

```text
[이기종 데이터 소스 (Oracle, MySQL, Excel)]
                    │
                    ▼ (Change Data Capture / Batch Poll)
          [ETL 수집 워커 풀 (Worker Pool)]
                    │
                    ▼
          [Redis 기반 작업 대기열 & 멱등성 검증]
                    │
                    ▼
       [Data Transformation & Validation Core]
                    │
                    ▼
         [PostgreSQL 분석용 데이터 마트] ──▶ [실시간 Control Room 대시보드]
```

### 주요 기술적 도전 과제
1. **네트워크 장애 시 데이터 유실 방지 (At-least-once & Idempotency)**
   * 각 데이터 패킷마다 고유 해시 기반의 멱등키(Idempotency Key)를 부여하여 중복 처리를 방지.
   * 작업 실패 시 Dead Letter Queue(DLQ)로 자동 격리 후 지수 백오프(Exponential Backoff) 기반 자동 재시도 로직 구현.
2. **동적 스키마 변환 엔진**:
   * 소스 데이터의 컬럼 변경 시 파이프라인이 중단되지 않도록 유연한 JSONB 매핑 레이어 설계.

---

## 📊 3. 비즈니스 성과

* **데이터 반영 주기 단축**: 기존 24시간 배치 ➔ **실시간 30초 내 동기화**
* **데이터 정합성 오류율**: **0.01% 미만으로 감소** (자동 무결성 검증 룰 120개 적용)
* **월 정산 마감 소요 시간**: 기존 5일 ➔ **당일 2시간 내 자동 완료**
