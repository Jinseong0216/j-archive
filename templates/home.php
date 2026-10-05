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
        <div class="w-28 h-28 sm:w-36 sm:h-36 md:w-44 md:h-44 rounded-2xl bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-800 p-1 shadow-2xl flex-shrink-0">
            <div class="w-full h-full rounded-2xl bg-cardbg flex flex-col items-center justify-center text-center p-4 border border-indigo-500/30">
                <span class="text-3xl sm:text-5xl mb-1">💻</span>
                <span class="text-xs font-mono text-indigo-400 font-bold">&lt;Developer /&gt;</span>
            </div>
        </div>
    </div>
</section>

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

    <div class="space-y-4">
        <?php foreach (array_slice($blogPosts, 0, 3) as $post): ?>
        <a href="/blog/<?= App\View::e($post['slug']) ?>" class="group block p-5 rounded-xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-indigo-500 transition-all">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-1 text-xs text-gray-500 dark:text-gray-400">
                <span class="font-medium text-brand-600 dark:text-brand-400"><?= App\View::e($post['category'] ?? 'Tech') ?></span>
                <div class="flex items-center gap-2">
                    <time><?= App\View::e($post['date']) ?></time>
                    <span>•</span>
                    <span><?= App\View::e($post['reading_time']) ?>분 읽기</span>
                </div>
            </div>
            <h3 class="text-base font-bold text-gray-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">
                <?= App\View::e($post['title']) ?>
            </h3>
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                <?= App\View::e($post['summary']) ?>
            </p>
        </a>
        <?php endforeach; ?>
    </div>
</section>
