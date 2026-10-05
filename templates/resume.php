<div class="space-y-12">
    <!-- Resume Header -->
    <section class="border-b border-gray-200 dark:border-borderbg pb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
            <div>
                <span class="text-xs font-bold text-brand-600 dark:text-brand-400 uppercase tracking-widest">Resume &amp; Career History</span>
                <h1 class="text-3xl sm:text-4xl font-black text-gray-900 dark:text-white mt-1">
                    <?= App\View::e($profile['name']) ?>
                </h1>
                <p class="text-base text-gray-600 dark:text-gray-300 mt-1 font-medium">
                    <?= App\View::e($profile['title']) ?>
                </p>
            </div>
            
            <div class="flex items-center gap-2">
                <button onclick="window.print()" class="px-3.5 py-2 text-xs font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-cardbg dark:hover:bg-gray-800 border border-gray-300 dark:border-borderbg text-gray-800 dark:text-gray-200 flex items-center gap-1.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    <span>이력서 인쇄 / PDF 저장</span>
                </button>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 text-xs text-gray-600 dark:text-gray-400">
            <div class="flex items-center gap-1">
                <span>📧</span>
                <a href="mailto:<?= App\View::e($profile['email']) ?>" class="hover:underline font-mono"><?= App\View::e($profile['email']) ?></a>
            </div>
            <div class="flex items-center gap-1">
                <span>🐙</span>
                <a href="<?= App\View::e($profile['github']) ?>" target="_blank" class="hover:underline font-mono"><?= App\View::e($profile['github']) ?></a>
            </div>
            <div class="flex items-center gap-1">
                <span>📍</span>
                <span><?= App\View::e($profile['location']) ?></span>
            </div>
        </div>
    </section>

    <!-- Core Philosophy / Intro -->
    <section>
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
            <span>🎯</span> 개발자로서의 나 (Engineering Statement)
        </h2>
        <div class="p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg text-sm sm:text-base leading-relaxed text-gray-700 dark:text-gray-300 space-y-3">
            <p>
                저는 단순히 코드를 타이핑하는 것을 넘어, <strong>"비즈니스 프로세스의 비효율을 소프트웨어와 데이터 파이프라인으로 해결하는 엔지니어"</strong>입니다.
            </p>
            <p>
                대용량 공정 데이터의 병목 현상을 파악하고 쿼리와 알고리즘을 튜닝하여 90% 이상의 연산 시간 단축을 이끌어낸 경험이 있으며, 실패에 탄력적인 멱등성(Idempotency) 분산 시스템을 구축하는 데 전문성을 가지고 있습니다.
            </p>
        </div>
    </section>

    <!-- Technical Skills Matrix -->
    <section>
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span>🛠️</span> 기술 스택 (Technical Skills)
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <?php foreach ($profile['skills'] ?? [] as $category => $skillList): ?>
            <div class="p-5 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg">
                <h3 class="text-xs font-bold text-indigo-500 uppercase tracking-wider mb-2.5"><?= App\View::e($category) ?></h3>
                <div class="flex flex-wrap gap-1.5">
                    <?php foreach ($skillList as $skill): ?>
                    <span class="px-2.5 py-1 text-xs font-mono font-medium rounded-lg bg-gray-100 dark:bg-darkbg text-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-800"><?= App\View::e($skill) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Work Experience Timeline -->
    <section>
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
            <span>💼</span> 경력 및 지나온 길 (Work Experience)
        </h2>

        <div class="relative border-l-2 border-indigo-500/30 ml-4 sm:ml-6 space-y-8 pb-4">
            <?php foreach ($career as $job): ?>
            <div class="relative pl-6 sm:pl-8">
                <!-- Timeline Dot -->
                <div class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full border-2 <?= $job['current'] ? 'bg-brand-500 border-white dark:border-darkbg shadow-md shadow-brand-500/50' : 'bg-gray-300 dark:bg-gray-700 border-white dark:border-darkbg' ?>"></div>

                <div class="p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg shadow-sm">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-2">
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white"><?= App\View::e($job['company']) ?></h3>
                            <?php if ($job['current']): ?>
                            <span class="px-2 py-0.5 text-[11px] font-bold rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">현재 직장</span>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs font-medium text-gray-500 dark:text-gray-400 font-mono"><?= App\View::e($job['period']) ?></span>
                    </div>

                    <div class="text-sm font-semibold text-brand-600 dark:text-brand-400 mb-2">
                        <?= App\View::e($job['role']) ?>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <?= App\View::e($job['summary']) ?>
                    </p>

                    <!-- Key Responsibilities & Achievements -->
                    <div class="space-y-1.5 mb-4">
                        <h4 class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">주요 성과 및 역할:</h4>
                        <ul class="list-disc list-inside space-y-1 text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            <?php foreach ($job['responsibilities'] ?? [] as $resp): ?>
                            <li><?= App\View::e($resp) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Tech Stack Tags -->
                    <div class="flex flex-wrap gap-1.5 pt-3 border-t border-gray-100 dark:border-gray-800/80">
                        <?php foreach ($job['tech_stack'] ?? [] as $t): ?>
                        <span class="px-2 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-darkbg text-gray-600 dark:text-gray-400"><?= App\View::e($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Ongoing Side Projects (이력서 내 사이드 프로젝트 항목) -->
    <section>
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
            <span>⚡</span> 진행 중인 개인 사이드 프로젝트 (Side Projects)
        </h2>

        <div class="space-y-4">
            <?php foreach ($sideProjects as $sp): ?>
            <div class="p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                    <div class="flex items-center gap-2">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white"><?= App\View::e($sp['title']) ?></h3>
                        <span class="px-2 py-0.5 text-xs font-semibold rounded bg-amber-500/10 text-amber-400 border border-amber-500/20"><?= App\View::e($sp['status']) ?></span>
                    </div>
                    <span class="text-xs font-mono text-gray-400"><?= App\View::e($sp['period']) ?></span>
                </div>

                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-3">
                    <?= App\View::e($sp['summary']) ?>
                </p>

                <ul class="list-disc list-inside space-y-1 text-xs text-gray-600 dark:text-gray-300 mb-4">
                    <?php foreach ($sp['features'] ?? [] as $feat): ?>
                    <li><?= App\View::e($feat) ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-gray-100 dark:border-gray-800">
                    <div class="flex flex-wrap gap-1.5">
                        <?php foreach ($sp['tech_stack'] ?? [] as $st): ?>
                        <span class="px-2 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-darkbg text-gray-600 dark:text-gray-400"><?= App\View::e($st) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($sp['github'])): ?>
                    <a href="<?= App\View::e($sp['github']) ?>" target="_blank" class="text-xs font-semibold text-brand-600 dark:text-brand-400 hover:underline flex items-center gap-1">
                        <span>GitHub Repository →</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
