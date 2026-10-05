<div class="space-y-8">
    <div class="border-b border-gray-200 dark:border-borderbg pb-6">
        <h1 class="text-3xl sm:text-4xl font-black text-gray-900 dark:text-white">개발 블로그 (Blog)</h1>
        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mt-2">
            소프트웨어를 설계하고 개발하며 마주친 기술적 문제, 아키텍처 고민, 그리고 배운 점들을 기록하는 공간입니다.
        </p>
    </div>

    <!-- Blog Posts List -->
    <div class="space-y-6">
        <?php foreach ($blogPosts as $post): ?>
        <article class="p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 transition-all shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 text-xs text-gray-500 dark:text-gray-400 mb-2">
                <span class="font-bold text-brand-600 dark:text-brand-400 uppercase tracking-wider"><?= App\View::e($post['category'] ?? 'Tech') ?></span>
                <div class="flex items-center gap-2">
                    <time datetime="<?= App\View::e($post['date']) ?>"><?= App\View::e($post['date']) ?></time>
                    <span>•</span>
                    <span>약 <?= App\View::e($post['reading_time']) ?>분 소요</span>
                </div>
            </div>

            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                <a href="/blog/<?= App\View::e($post['slug']) ?>" class="hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                    <?= App\View::e($post['title']) ?>
                </a>
            </h2>

            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                <?= App\View::e($post['summary']) ?>
            </p>

            <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-gray-100 dark:border-gray-800">
                <div class="flex flex-wrap gap-1.5">
                    <?php foreach ($post['tags'] ?? [] as $tag): ?>
                    <span class="px-2 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-darkbg text-gray-600 dark:text-gray-400">#<?= App\View::e($tag) ?></span>
                    <?php endforeach; ?>
                </div>

                <a href="/blog/<?= App\View::e($post['slug']) ?>" class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 dark:text-brand-400 hover:underline">
                    <span>글 읽기</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</div>
