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
