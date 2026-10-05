<article class="max-w-4xl mx-auto space-y-8">
    <!-- Back Button -->
    <div>
        <a href="/projects" class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>프로젝트 목록으로 돌아가기</span>
        </a>
    </div>

    <!-- Project Header Banner -->
    <header class="p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-cardbg via-darkbg to-indigo-950/40 border border-gray-200 dark:border-borderbg shadow-sm">
        <div class="flex items-center gap-2 text-xs font-bold text-brand-400 uppercase tracking-widest mb-3">
            <span><?= App\View::e($project['category'] ?? 'Engineering Project') ?></span>
            <span>•</span>
            <span class="font-mono text-gray-400"><?= App\View::e($project['period'] ?? '') ?></span>
        </div>

        <h1 class="text-2xl sm:text-4xl font-black text-gray-900 dark:text-white tracking-tight leading-tight mb-4">
            <?= App\View::e($project['title']) ?>
        </h1>

        <div class="flex flex-wrap items-center gap-y-2 gap-x-4 text-xs sm:text-sm text-gray-300 mb-6">
            <div>
                <span class="text-gray-500">역할:</span>
                <span class="font-semibold text-indigo-300"><?= App\View::e($project['role'] ?? 'Backend Engineer') ?></span>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 mb-6">
            <?php foreach ($project['tags'] ?? [] as $t): ?>
            <span class="px-2.5 py-1 text-xs font-mono rounded-lg bg-gray-800 text-gray-200 border border-gray-700/60"><?= App\View::e($t) ?></span>
            <?php endforeach; ?>
        </div>

        <!-- Links (GitHub, Demo) -->
        <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-gray-800">
            <?php if (!empty($project['github'])): ?>
            <a href="<?= App\View::e($project['github']) ?>" target="_blank" class="px-4 py-2 text-xs font-semibold rounded-xl bg-gray-800 hover:bg-gray-700 text-white flex items-center gap-1.5 transition-colors">
                <span>GitHub 저장소 ↗</span>
            </a>
            <?php endif; ?>
            <?php if (!empty($project['demo'])): ?>
            <a href="<?= App\View::e($project['demo']) ?>" target="_blank" class="px-4 py-2 text-xs font-semibold rounded-xl bg-brand-600 hover:bg-brand-500 text-white flex items-center gap-1.5 transition-colors">
                <span>라이브 데모 ↗</span>
            </a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Markdown Content Body -->
    <div class="prose prose-base dark:prose-invert max-w-none py-4 prose-headings:font-bold prose-headings:tracking-tight prose-h2:border-b prose-h2:border-gray-200 dark:prose-h2:border-gray-800 prose-h2:pb-2">
        <?= $project['content_html'] ?>
    </div>

    <!-- Bottom Footer Navigation -->
    <div class="pt-8 border-t border-gray-200 dark:border-borderbg flex justify-between items-center text-xs">
        <a href="/projects" class="font-semibold text-brand-600 dark:text-brand-400 hover:underline">
            ← 다른 프로젝트 살펴보기
        </a>
        <a href="/resume" class="text-gray-500 hover:text-white transition-colors">
            이력서 전체 보기 →
        </a>
    </div>
</article>
