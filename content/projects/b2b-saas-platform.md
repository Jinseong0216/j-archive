---
title: "B2B SaaS 멀티테넌트 코어 플랫폼 구축 및 마이그레이션"
category: "Web & Platform"
order: 80
date: "2023-01-20"
period: "2022.01 - 2022.10 (10개월)"
role: "Full Stack Engineer"
tags: "Laravel, Vue.js, MySQL, Redis, Nginx, Docker, OAuth 2.0"
summary: "단일 테넌트 기반 레거시 웹 서비스를 완전한 데이터 격리를 보장하는 클라우드 네이티브 멀티테넌트 SaaS 구조로 전환한 프로젝트입니다."
github: "https://github.com/jinseong-choi/saas-core-platform"
---

## 📌 1. 프로젝트 배경

고객사 수가 늘어나면서 고객사마다 별도의 서버와 데이터베이스를 배포·관리하던 방식의 유지보수 한계에 봉착했습니다. 비용 절감과 빠른 온보딩을 위해 단일 인프라에서 수백 개의 기업 고객을 안전하게 격리 수용하는 멀티테넌트 SaaS 아키텍처로의 전환이 필요했습니다.

---

## 🏗️ 2. 기술적 해결 방법

* **테넌트별 완벽한 데이터 격리 (Database-per-tenant + Schema routing)**:
  * 서브도메인(`companyA.service.com`)을 기반으로 요청 시점에 동적으로 DB 커넥션을 스위칭하는 커스텀 미들웨어 구현.
* **보안 및 권한 체계 (RBAC)**:
  * 역할 기반 권한 제어(Role-Based Access Control) 모듈을 설계하여 기업 내 부서별 세분화된 접근 권한 부여.
* **배포 자동화**:
  * 신규 고객사 가입 시 스키마 마이그레이션과 시드 데이터 주입을 10초 이내에 자동 완료하는 온보딩 파이프라인 완성.

---

## 📊 3. 성과

* **인프라 호스팅 비용**: 고객사당 월 인프라 비용 **75% 절감**
* **신규 고객사 셋업 시간**: 기존 1일 ➔ **3분 자동 세팅**
* **안정성**: 99.9% 이상의 가동률(Uptime) 달성
