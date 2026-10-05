# 🚀 Modern PHP Portfolio, Resume & Dev Blog

초경량 모던 PHP 8.3 기반으로 구축된 **올인원 개발자 브랜드 웹사이트**입니다.  
데이터베이스 설치 및 서버 관리 부담 없이 마크다운(`.md`) 파일과 JSON 데이터만으로 초고속 서빙을 지원합니다.

---

## 🌟 주요 기능 (Features)

1. **소개 (Home / Intro)**:
   - 개발자 프로필, 한 줄 비전, 현재 포커스 중인 기술 스택
   - 주요 프로젝트 및 최신 기술 블로그 글 자동 프리뷰
2. **경력 & 이력서 (Career & Resume)**:
   - 현재 직장 및 상세 업무/성과 요약
   - 지난 경력 타임라인 (직무, 기간, 기여도 및 기술 스택)
   - 현재 진행 중인 개인 사이드 프로젝트 현황
   - 이력서 인쇄 및 PDF 저장 버튼 내장
3. **프로젝트 쇼케이스 (Project Showcase)**:
   - 카테고리별 프로젝트 갤러리 (`/projects`)
   - 마크다운 기반의 상세 기술 분석 페이지 (`/projects/{slug}`)
   - 문제 정의, 아키텍처 다이어그램, 핵심 코드 스니펫, 정량적 개선 지표 수록
4. **기술 블로그 (Developer Blog)**:
   - 글 목록 및 읽기 소요 시간 자동 계산 (`/blog`)
   - 마크다운 기반 본문 렌더링 (`/blog/{slug}`)
   - Prism.js를 활용한 프로그래밍 언어별 구문 강조(Syntax Highlighting) 지원
5. **모던 UI/UX**:
   - Tailwind CSS 기반 반응형 레이아웃 (모바일/태블릿/데스크톱 완벽 대응)
   - 시스템 설정 및 수동 토글 지원 다크/라이트 모드

---

## 📂 프로젝트 구조 (Architecture)

```text
my-portfolio/
├── content/                     # 마크다운 기반 콘텐츠
│   ├── blog/                    # 기술 블로그 글 (.md)
│   └── projects/                # 프로젝트 상세 기술서 (.md)
├── data/                        # 정형 데이터 (수정 용이)
│   ├── profile.json             # 프로필, 스킬셋, 소개글
│   ├── career.json              # 경력 타임라인 및 직장별 성과
│   └── side_projects.json       # 현재 진행 중인 사이드 프로젝트 목록
├── public/                      # 웹 서버 루트
│   └── index.php                # 프론트 컨트롤러 및 라우터
├── src/                         # 코어 PHP 로직
│   ├── Router.php               # 초경량 정규식 라우터
│   ├── ContentService.php       # JSON & Markdown 데이터 로더
│   └── View.php                 # 템플릿 및 레이아웃 렌더러
├── templates/                   # UI 뷰 템플릿
│   ├── layout.php               # 공통 레이아웃 (헤더, 네비게이션, 푸터)
│   ├── home.php                 # 홈 페이지
│   ├── resume.php               # 경력 & 이력서 페이지
│   ├── projects/                # 프로젝트 목록 및 상세 뷰
│   └── blog/                    # 블로그 목록 및 상세 뷰
├── nginx.conf.example           # 오라클 클라우드 / VPS 배포용 Nginx 설정 예시
└── composer.json
```

---

## 💻 로컬 개발 서버 실행 방법

PHP 8.2 이상이 설치된 환경에서 아래 명령어를 실행합니다:

```bash
# 내장 웹서버 실행
php -S localhost:8000 -t public public/index.php
```

웹 브라우저에서 `http://localhost:8000` 으로 접속하면 즉시 사이트가 뜹니다.

---

## ✍️ 콘텐츠 추가 및 수정 가이드

### 1. 블로그 글 작성
`content/blog/` 폴더에 `YYYY-MM-DD-제목.md` 파일을 생성하고 아래처럼 프론트매터를 작성하면 자동으로 블로그에 등록됩니다:

```markdown
---
title: "내 새로운 글 제목"
category: "Tech"
date: "2026-10-05"
tags: "PHP, Architecture"
summary: "글 목록에 노출될 간단한 요약문입니다."
---

## 본문 내용
여기에 마크다운 문법으로 자유롭게 글을 작성하세요.
```

### 2. 프로젝트 추가
`content/projects/` 폴더에 `프로젝트명.md` 파일을 생성하면 자동으로 프로젝트 갤러리와 상세 페이지가 생성됩니다:

```markdown
---
title: "프로젝트 명칭"
category: "Backend"
order: 100
period: "2026.01 - 2026.06"
role: "Lead Developer"
tags: "PHP, Docker, PostgreSQL"
summary: "프로젝트 개요 및 성과 요약"
github: "https://github.com/..."
demo: "https://..."
---

## 1. 프로젝트 배경 및 문제 정의
...
```

### 3. 이력서 및 경력 수정
* 기본 프로필 및 기술 스택: `data/profile.json`
* 회사 경력 및 업무 성과: `data/career.json`
* 진행 중인 사이드 프로젝트: `data/side_projects.json`

---

## ☁️ 오라클 클라우드 (Always Free) 배포 가이드

1. 오라클 클라우드 평생 무료 Ubuntu 인스턴스 생성
2. Nginx 및 PHP 8.3-FPM 설치:
   ```bash
   sudo apt install -y nginx php8.3-fpm php8.3-cli php8.3-mbstring php8.3-xml
   ```
3. 저장소 클론 및 권한 설정:
   ```bash
   git clone https://github.com/jinseong-choi/my-portfolio.git /var/www/my-portfolio
   sudo chown -R www-data:www-data /var/www/my-portfolio
   ```
4. `nginx.conf.example` 파일을 `/etc/nginx/sites-available/default` 에 복사 후 `sudo systemctl restart nginx` 실행
