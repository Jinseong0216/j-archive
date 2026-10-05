---
title: "차세대 고속 공정 스케줄링(APS) 엔진 고도화"
category: "Backend & Architecture"
order: 100
date: "2024-11-20"
period: "2024.05 - 2024.11 (6개월)"
role: "Lead Backend Architect & Core Developer"
tags: "PHP 8.3, PostgreSQL, Redis, Memory Optimization, Algorithm"
summary: "수만 개의 공정 주문과 설비 제약 조건을 실시간으로 계산하는 APS 엔진의 아키텍처를 전면 개편하여 계산 시간을 45분에서 4분으로 91% 단축시킨 프로젝트입니다."
github: "https://github.com/jinseong-choi/aps-engine-core"
demo: "https://aps-demo.jinseong.dev"
---

## 📌 1. 프로젝트 배경 및 문제 정의 (Background & Problem)

기존 레거시 공정 스케줄링(Advanced Planning and Scheduling, APS) 시스템은 일 단위 공정 주문량이 5만 건을 넘어서면서 심각한 병목 현상이 발생하고 있었습니다.

* **심각한 연산 지연**: 하루 주문 배치 스케줄링 계산에 평균 **45분 이상** 소요되어 납기 변동에 즉각 대응 불가.
* **메모리 누수 및 OOM(Out of Memory)**: 대용량 데이터 로딩 시 PHP 프로세스 메모리가 급증하여 서버 크래시 발생.
* **복잡한 설비 제약 조건**: 설비 가동 시간, 작업자 교대, 금형 교체 시간 등 비선형 제약 조건이 늘어나며 시간 복잡도가 급격히 증가함.

---

## 🏗️ 2. 아키텍처 및 핵심 해결 전략 (Architecture & Solutions)

```text
[공정 주문 데이터] ───▶ [1단계: 인메모리 사전 필터링 & 청킹]
                                 │
                                 ▼
                     [2단계: 병렬 최적화 연산 엔진]
                     (PHP 8.3 JIT + SplFixedArray 구조)
                                 │
                                 ▼
                     [3단계: PostgreSQL 벌크 UPSERT 트랜잭션]
                                 │
                                 ▼
                     [결과: Redis 캐싱 & 실시간 대시보드 반영]
```

### 전략 1: 데이터 구조 최적화 (Memory footprint reduction)
PHP의 표준 연관 배열(Array)은 해시테이블 구조로 인해 오버헤드가 큽니다. 대용량 공정 노드를 다룰 때 메모리 낭비를 줄이기 위해 구조화된 객체와 `SplFixedArray`를 도입했습니다.
* 노드당 메모리 사용량: **2.8KB ➔ 420B (약 85% 절감)**
* 수만 건의 노드를 한 번에 메모리에 적재해도 256MB 내에서 안정적으로 구동.

### 전략 2: DB IO 병목 해소 (Bulk Operations & Pipeline)
기존의 행(Row) 단위 반복 쿼리를 전면 폐기하고, PostgreSQL의 `UNNEST`를 활용한 1회성 벌크 매핑 쿼리와 트랜잭션 격리 수준 조정을 적용했습니다.

```sql
-- 대량 공정 할당 데이터를 1회성 배치로 갱신하는 최적화 쿼리 예시
INSERT INTO schedule_allocations (order_id, machine_id, start_time, end_time)
SELECT * FROM UNNEST($1::int[], $2::int[], $3::timestamp[], $4::timestamp[])
ON CONFLICT (order_id) DO UPDATE 
SET machine_id = EXCLUDED.machine_id, 
    start_time = EXCLUDED.start_time, 
    end_time = EXCLUDED.end_time;
```

---

## 📊 3. 주요 성과 및 비즈니스 결과 (Key Results)

| 지표 | 개선 전 (Before) | 개선 후 (After) | 개선율 |
| :--- | :---: | :---: | :---: |
| **전체 스케줄링 연산 시간** | 45분 20초 | **4분 12초** | **91% 단축** 🚀 |
| **피크 메모리 사용량** | 3.2 GB (OOM 발생) | **380 MB** | **88% 감소** |
| **긴급 오더 재계산 반영 시간** | 15분 | **즉시 반영 (30초 미만)** | 현장 운영 효율 300% 향상 |

---

## 💡 4. 기술적 회고 (Lessons Learned)

* **언어의 한계가 아닌 아키텍처의 문제**: PHP는 스케줄링 같은 무거운 연산에 적합하지 않다는 편견이 있었으나, 적절한 자료구조 선택과 PHP 8.3 JIT 엔진, 그리고 DB I/O 최적화를 조합하면 C++ 못지않은 실시간 처리가 가능함을 증명했습니다.
* **현업과의 긴밀한 소통**: 알고리즘 수식의 복잡도를 낮추기 위해 현장 관리자와 지속적으로 미팅하며, 실무에서 실제로 불필요한 과도한 제약 조건을 사전에 가지치기(Pruning)한 것이 가장 큰 성능 개선의 열쇠였습니다.
