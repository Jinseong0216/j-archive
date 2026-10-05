<article class="max-w-3xl mx-auto space-y-8">
    <!-- Back to Blog -->
    <div>
        <a href="/blog" class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>블로그 글 목록으로 돌아가기</span>
        </a>
    </div>

    <!-- Article Header -->
    <header class="border-b border-gray-200 dark:border-borderbg pb-6 space-y-3">
        <div class="flex items-center gap-2 text-xs font-bold text-brand-600 dark:text-brand-400 uppercase tracking-widest">
            <span><?= App\View::e($post['category'] ?? 'Tech') ?></span>
            <span>•</span>
            <time datetime="<?= App\View::e($post['date']) ?>" class="font-mono text-gray-500 dark:text-gray-400"><?= App\View::e($post['date']) ?></time>
            <span>•</span>
            <span class="text-gray-500 dark:text-gray-400">약 <?= App\View::e($post['reading_time']) ?>분 읽기</span>
        </div>

        <h1 class="text-2xl sm:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight leading-tight">
            <?= App\View::e($post['title']) ?>
        </h1>

        <div class="flex flex-wrap gap-1.5 pt-2">
            <?php foreach ($post['tags'] ?? [] as $tag): ?>
            <span class="px-2.5 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-cardbg text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-800">#<?= App\View::e($tag) ?></span>
            <?php endforeach; ?>
        </div>
    </header>

    <!-- Post Body (Markdown Rendered HTML) -->
    <div class="prose prose-base sm:prose-lg dark:prose-invert max-w-none py-2 prose-headings:font-bold prose-headings:tracking-tight prose-h2:border-b prose-h2:border-gray-200 dark:prose-h2:border-gray-800 prose-h2:pb-2">
        <?= $post['content_html'] ?>
    </div>

    <!-- Author Box -->
    <section class="mt-12 p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-brand-600 to-indigo-400 flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
            JC
        </div>
        <div class="flex-grow">
            <h3 class="font-bold text-sm text-gray-900 dark:text-white"><?= App\View::e($profile['name']) ?></h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5"><?= App\View::e($profile['title']) ?></p>
            <p class="text-xs text-gray-600 dark:text-gray-300 mt-2"><?= App\View::e($profile['bio']) ?></p>
        </div>
    </section>

    <!-- Bottom Navigation -->
    <div class="pt-8 border-t border-gray-200 dark:border-borderbg flex justify-between items-center text-xs">
        <a href="/blog" class="font-semibold text-brand-600 dark:text-brand-400 hover:underline">
            ← 목록으로
        </a>
        <a href="#top" class="text-gray-400 hover:text-white transition-colors">
            맨 위로 ↑
        </a>
    </div>
</article>
