<!-- Hero Section -->
<section class="py-6 sm:py-10">
    <div class="flex flex-col-reverse md:flex-row items-start md:items-center justify-between gap-8">
        <div class="space-y-4 max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span><?= App\View::e($profile['status_message'] ?? 'Currently building cool things') ?></span>
            </div>
            
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white leading-tight">
                안녕하세요, <br class="hidden sm:block" />
                <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                    <?= App\View::e($profile['name'] ?? '개발자 J') ?>
                </span> 입니다.
            </h1>

            <p class="text-lg font-medium text-gray-700 dark:text-gray-300 leading-relaxed">
                <?= App\View::e($profile['title'] ?? 'Backend & Full Stack Engineer') ?>
            </p>

            <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-sm sm:text-base">
                <?= App\View::e($profile['bio']) ?>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <a href="/resume" class="px-5 py-2.5 rounded-xl font-semibold text-sm bg-brand-600 hover:bg-brand-500 text-white shadow-md shadow-brand-500/20 transition-all flex items-center gap-2">
                    <span>이력서 및 경력 보기</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="/projects" class="px-5 py-2.5 rounded-xl font-semibold text-sm bg-white dark:bg-cardbg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-borderbg transition-all">
                    프로젝트 둘러보기
                </a>
                <a href="/blog" class="px-4 py-2.5 rounded-xl font-semibold text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                    개발 블로그 →
                </a>
            </div>
        </div>

        <!-- Avatar / Visual Card -->
        <div class="relative group flex-shrink-0">
            <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-70 blur-md group-hover:opacity-100 transition duration-500"></div>
            <div class="relative w-36 h-36 sm:w-44 sm:h-44 md:w-52 md:h-52 rounded-2xl overflow-hidden border-2 border-indigo-500/40 shadow-2xl bg-gray-900">
                <img src="/images/avatar.jpg" alt="개발자 J" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <!-- Online status indicator badge -->
            <div class="absolute -bottom-2 -right-2 bg-white dark:bg-cardbg px-3 py-1 rounded-full border border-gray-200 dark:border-borderbg shadow-lg flex items-center gap-1.5 text-xs font-semibold text-gray-700 dark:text-gray-300">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Active</span>
            </div>
        </div>
    </div>
</section>

<!-- Quick Terminal Command Bridge (다른 기기/노트북에서 명령어 복사용) -->
<section class="my-8 p-5 sm:p-6 rounded-2xl bg-gray-900 border border-indigo-500/40 shadow-xl text-white">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4 border-b border-gray-800 pb-3">
        <div class="flex items-center gap-3">
            <span class="p-2 rounded-xl bg-indigo-500/20 text-indigo-400 text-lg">⚡</span>
            <div>
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    터미널 빠른 명령어 복사 (Quick Terminal Snippet)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">1-Click Copy</span>
                </h2>
                <p class="text-xs text-gray-400">다른 기기나 노트북 터미널에서 바로 붙여넣을 수 있도록 원클릭 복사 버튼을 제공합니다.</p>
            </div>
        </div>
    </div>

    <!-- Section 0: [가장 추천] 포트폴리오 + 동생 식당 2개 사이트 동시 가동 -->
    <div class="space-y-4 p-4 sm:p-5 rounded-2xl bg-indigo-950/40 border border-indigo-500/30">
        <div class="flex items-center justify-between border-b border-indigo-500/20 pb-3">
            <div class="flex items-center gap-2 text-sm sm:text-base font-bold text-amber-300">
                <span>🔥</span>
                <span>[서버 노트북] 포트폴리오(8000) + 동생 식당(8002) 2개 사이트 동시 가동</span>
            </div>
            <span class="text-[11px] font-mono text-indigo-300 bg-indigo-500/20 px-2.5 py-0.5 rounded-full border border-indigo-500/30">원클릭 6단계</span>
        </div>

        <!-- 1단계: 기존 프로세스 정리 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-red-400"></span>
                    <span>1단계. 기존 PHP 서버 모두 끄기 (포트 충돌 클리어)</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">pkill</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-pkill" class="text-xs sm:text-sm font-mono text-rose-300 break-all select-all">pkill -f "php -S"</code>
                <button type="button" onclick="copySnippet('cmd-dual-pkill', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 2단계: 내 포트폴리오 8000번 가동 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>
                    <span>2단계. 내 포트폴리오(j-archive) 최신 코드 받고 8000번으로 가동</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">portfolio :8000</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-portfolio" class="text-xs sm:text-sm font-mono text-indigo-300 break-all select-all">cd ~/j-archive &amp;&amp; git pull &amp;&amp; nohup php -S 0.0.0.0:8000 -t public public/index.php &gt; portfolio.log 2&gt;&amp;1 &amp;</code>
                <button type="button" onclick="copySnippet('cmd-dual-portfolio', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 3단계: 동생 식당 8002번 가동 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>3단계. 동생 식당(Shokudo-Yeonje) 최신 코드 받고 8002번으로 가동</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">shokudo :8002</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-shokudo" class="text-xs sm:text-sm font-mono text-emerald-300 break-all select-all">cd ~ &amp;&amp; ([ -d Shokudo-Yeonje ] || git clone https://github.com/Jinseong0216/Shokudo-Yeonje.git) &amp;&amp; cd Shokudo-Yeonje &amp;&amp; git pull &amp;&amp; nohup php -S 0.0.0.0:8002 -t public public/index.php &gt; shokudo.log 2&gt;&amp;1 &amp;</code>
                <button type="button" onclick="copySnippet('cmd-dual-shokudo', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 4단계: 2개 사이트 가동 상태 확인 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                    <span>4단계. 2개 사이트가 나란히 실행 중인지 확인 (8000, 8002 둘 다 뜨면 성공!)</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">ps aux</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-ps" class="text-xs sm:text-sm font-mono text-sky-300 break-all select-all">ps aux | grep "php -S"</code>
                <button type="button" onclick="copySnippet('cmd-dual-ps', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 5단계: 외부 공개 터널 2개 동시 열기 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                    <span>5단계. 스마트폰/외부 접속용 Cloudflare 터널 2개 동시 실행</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">cloudflared x2</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-tunnel" class="text-xs sm:text-sm font-mono text-purple-300 break-all select-all">nohup cloudflared tunnel --url http://localhost:8000 &gt; tunnel_portfolio.log 2&gt;&amp;1 &amp; nohup cloudflared tunnel --url http://localhost:8002 &gt; tunnel_shokudo.log 2&gt;&amp;1 &amp;</code>
                <button type="button" onclick="copySnippet('cmd-dual-tunnel', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 6단계: 발급된 외부 링크 2개 확인 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    <span>6단계. 카카오톡으로 보낼 외부 접속 주소 2개 확인</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">check urls</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-dual-urls" class="text-xs sm:text-sm font-mono text-amber-300 break-all select-all">grep -o 'https://[-a-zA-Z0-9\.]*\.trycloudflare\.com' tunnel_portfolio.log tunnel_shokudo.log</code>
                <button type="button" onclick="copySnippet('cmd-dual-urls', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Section 1: Docker 4단계 가동 가이드 -->
    <div class="space-y-4">
        <div class="flex items-center gap-2 text-sm font-bold text-indigo-400 border-b border-gray-800/80 pb-2">
            <span>🐳</span>
            <span>저사양 노트북 도커(Docker) 완벽 가동 4단계</span>
        </div>

        <!-- 1단계. 기존 임시 PHP 서버 끄기 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-red-400"></span>
                    <span>1단계. 기존 임시 PHP 서버 끄기 (8000번 포트 충돌 방지)</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">pkill</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-pkill" class="text-xs sm:text-sm font-mono text-rose-300 break-all select-all">pkill -f "php -S"</code>
                <button type="button" onclick="copySnippet('cmd-pkill', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 2단계. 저사양 노트북에 도커 설치하기 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    <span>2단계. 노트북에 도커(Docker) 엔진 &amp; 도커 컴포즈 원클릭 설치</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">apt + docker</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-docker-install" class="text-xs sm:text-sm font-mono text-amber-300 break-all select-all">sudo apt update &amp;&amp; sudo apt install -y docker.io docker-compose-v2 &amp;&amp; sudo service docker start &amp;&amp; sudo usermod -aG docker $USER</code>
                <button type="button" onclick="copySnippet('cmd-docker-install', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 3단계. 최신 설정 코드 받고 도커로 빌드 & 가동 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>3단계. 최신 설정 코드 받고 도커로 빌드 &amp; 백그라운드 가동</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">compose up</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-docker-up" class="text-xs sm:text-sm font-mono text-emerald-300 break-all select-all">cd ~/j-archive &amp;&amp; git pull &amp;&amp; sudo docker compose up -d --build</code>
                <button type="button" onclick="copySnippet('cmd-docker-up', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 4단계. 도커 컨테이너 실행 확인 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                    <span>4단계. 🐳 도커 컨테이너가 정상적으로 도는지 확인 (j-archive-web-1, app-1)</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">docker ps</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-docker-ps" class="text-xs sm:text-sm font-mono text-sky-300 break-all select-all">sudo docker ps</code>
                <button type="button" onclick="copySnippet('cmd-docker-ps', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Section 2: Cloudflare Tunnel 외부 공개 터널 -->
    <div class="space-y-4 pt-4 border-t border-gray-800">
        <div class="flex items-center gap-2 text-sm font-bold text-purple-400 border-b border-gray-800/80 pb-2">
            <span>☁️</span>
            <span>Cloudflare Tunnel 전세계 실시간 외부 접속 터널</span>
        </div>

        <!-- 1. Cloudflared 설치 및 권한 부여 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>
                    <span>1. Cloudflared 다운로드 및 실행 권한 부여</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">curl + chmod</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-cloudflared-dl" class="text-xs sm:text-sm font-mono text-indigo-300 break-all select-all">curl -L --output cloudflared https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64 &amp;&amp; chmod +x cloudflared</code>
                <button type="button" onclick="copySnippet('cmd-cloudflared-dl', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>

        <!-- 2. Cloudflare Tunnel 실행 -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs text-gray-300 font-semibold">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                    <span>2. 8000번 포트 외부 공개 터널 열기 (로그인 불필요 무료 임시 URL)</span>
                </span>
                <span class="text-[11px] text-gray-500 font-mono">tunnel run</span>
            </div>
            <div class="relative flex items-center bg-gray-950 rounded-xl border border-gray-800 p-3 pr-24 overflow-hidden group">
                <code id="cmd-cloudflared-run" class="text-xs sm:text-sm font-mono text-purple-300 break-all select-all">./cloudflared tunnel --url http://localhost:8000</code>
                <button type="button" onclick="copySnippet('cmd-cloudflared-run', this)" class="absolute right-2 sm:right-3 px-3.5 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-md transition-all flex items-center gap-1.5 flex-shrink-0 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span>복사</span>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
function copySnippet(elementId, btnElement) {
    const el = document.getElementById(elementId);
    if (!el) return;
    const textToCopy = el.innerText.trim();

    function updateBtn() {
        const originalHtml = btnElement.innerHTML;
        btnElement.innerHTML = `
            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>복사 완료! ✓</span>
        `;
        btnElement.classList.remove('bg-indigo-600', 'hover:bg-indigo-500');
        btnElement.classList.add('bg-emerald-600', 'hover:bg-emerald-500');
        setTimeout(() => {
            btnElement.innerHTML = originalHtml;
            btnElement.classList.remove('bg-emerald-600', 'hover:bg-emerald-500');
            btnElement.classList.add('bg-indigo-600', 'hover:bg-indigo-500');
        }, 2000);
    }

    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(textToCopy).then(updateBtn).catch(() => fallbackCopy(textToCopy, updateBtn));
    } else {
        fallbackCopy(textToCopy, updateBtn);
    }
}

function fallbackCopy(text, callback) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        callback();
    } catch (err) {
        prompt('명령어를 복사하세요 (Ctrl+C):', text);
    }
    textArea.remove();
}
</script>

<!-- Stats Grid -->
<section class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-8">
    <?php foreach ($profile['stats'] ?? [] as $stat): ?>
    <div class="p-5 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg shadow-sm">
        <div class="text-2xl sm:text-3xl font-black text-brand-600 dark:text-brand-400 mb-1">
            <?= App\View::e($stat['value']) ?>
        </div>
        <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 tracking-wide uppercase">
            <?= App\View::e($stat['label']) ?>
        </div>
    </div>
    <?php endforeach; ?>
</section>

<!-- Current Status / Ongoing Focus -->
<section class="my-10 p-6 rounded-2xl bg-gradient-to-r from-indigo-900/30 via-purple-900/20 to-transparent border border-indigo-500/20">
    <div class="flex items-center gap-3 mb-3">
        <span class="text-xl">🚀</span>
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">현재 진행 중인 사이드 프로젝트 (Current Focus)</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <?php foreach (array_slice($sideProjects, 0, 2) as $sp): ?>
        <div class="p-4 rounded-xl bg-white dark:bg-darkbg/60 border border-gray-200 dark:border-borderbg">
            <div class="flex items-center justify-between gap-2 mb-2">
                <h3 class="font-bold text-sm text-gray-900 dark:text-white"><?= App\View::e($sp['title']) ?></h3>
                <span class="px-2 py-0.5 text-xs font-semibold rounded bg-amber-500/10 text-amber-400 border border-amber-500/20"><?= App\View::e($sp['badge'] ?? 'In Progress') ?></span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2"><?= App\View::e($sp['summary']) ?></p>
            <div class="flex flex-wrap gap-1.5">
                <?php foreach ($sp['tech_stack'] ?? [] as $tech): ?>
                <span class="px-2 py-0.5 text-[11px] font-mono rounded bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300"><?= App\View::e($tech) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Featured Projects Preview -->
<section class="my-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">주요 프로젝트 (Featured Projects)</h2>
            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">실제 비즈니스 문제를 해결하고 성과를 도출한 대표 프로젝트들입니다.</p>
        </div>
        <a href="/projects" class="text-xs sm:text-sm font-semibold text-brand-600 dark:text-brand-400 hover:underline">
            전체 보기 →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach (array_slice($projects, 0, 2) as $proj): ?>
        <a href="/projects/<?= App\View::e($proj['slug']) ?>" class="group block p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 transition-all hover:-translate-y-1 shadow-sm">
            <div class="flex items-center justify-between mb-3 text-xs">
                <span class="font-semibold text-indigo-500 dark:text-indigo-400 uppercase tracking-wider"><?= App\View::e($proj['category'] ?? 'Project') ?></span>
                <span class="text-gray-400"><?= App\View::e($proj['period'] ?? $proj['date']) ?></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors mb-2">
                <?= App\View::e($proj['title']) ?>
            </h3>
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-3 leading-relaxed">
                <?= App\View::e($proj['summary']) ?>
            </p>
            <div class="flex flex-wrap gap-1.5 pt-2 border-t border-gray-100 dark:border-gray-800">
                <?php foreach (array_slice($proj['tags'], 0, 4) as $tag): ?>
                <span class="px-2 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300"><?= App\View::e($tag) ?></span>
                <?php endforeach; ?>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Latest Blog Posts Preview -->
<section class="my-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">최신 기술 블로그 (Latest Articles)</h2>
            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">개발 과정에서 겪은 문제와 해결 경험, 아키텍처 고민들을 기록합니다.</p>
        </div>
        <a href="/blog" class="text-xs sm:text-sm font-semibold text-brand-600 dark:text-brand-400 hover:underline">
            블로그 전체 글 →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <?php foreach (array_slice($blogPosts, 0, 3) as $post): 
            $cat = strtolower(trim($post['category'] ?? 'Tech'));
            $badgeColor = match (true) {
                str_contains($cat, 'arch') => 'bg-indigo-500/10 text-indigo-500 dark:text-indigo-400 border-indigo-500/20',
                str_contains($cat, 'tech') || str_contains($cat, 'review') => 'bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border-cyan-500/20',
                str_contains($cat, 'retro') || str_contains($cat, 'career') => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20',
                default => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20'
            };
        ?>
        <a href="/blog/<?= App\View::e($post['slug']) ?>" class="group flex flex-col justify-between p-5 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div>
                <div class="flex items-center justify-between gap-1 mb-2.5 text-xs text-gray-500 dark:text-gray-400">
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border <?= $badgeColor ?>">
                        <?= App\View::e($post['category'] ?? 'Tech') ?>
                    </span>
                    <span class="text-[11px]"><?= App\View::e($post['date']) ?></span>
                </div>
                <h3 class="text-base font-bold text-gray-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors line-clamp-2 leading-snug">
                    <?= App\View::e($post['title']) ?>
                </h3>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-2 line-clamp-3 leading-relaxed">
                    <?= App\View::e($post['summary']) ?>
                </p>
            </div>
            <div class="pt-3 mt-4 border-t border-gray-100 dark:border-gray-800/80 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                <span class="text-[11px]"><?= App\View::e($post['reading_time']) ?>분 읽기</span>
                <span class="font-semibold text-brand-600 dark:text-brand-400 group-hover:translate-x-1 transition-transform flex items-center gap-1 text-[11px]">
                    <span>읽기</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>
