<div class="space-y-8">
    <div class="border-b border-gray-200 dark:border-borderbg pb-6">
        <h1 class="text-3xl sm:text-4xl font-black text-gray-900 dark:text-white">프로젝트 (Projects)</h1>
        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mt-2">
            실제 서비스 개발 및 시스템 성능 최적화를 주도했던 주요 프로젝트들의 상세 내용과 성과를 기록한 공간입니다.
        </p>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($projects as $proj): ?>
        <div class="flex flex-col justify-between p-6 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 transition-all shadow-sm">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="font-bold text-brand-600 dark:text-brand-400 uppercase tracking-wider"><?= App\View::e($proj['category'] ?? 'Engineering') ?></span>
                    <span class="text-gray-400 font-mono"><?= App\View::e($proj['period'] ?? $proj['date']) ?></span>
                </div>

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    <a href="/projects/<?= App\View::e($proj['slug']) ?>" class="hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                        <?= App\View::e($proj['title']) ?>
                    </a>
                </h2>

                <div class="text-xs text-indigo-500 dark:text-indigo-400 font-semibold mb-3">
                    <?= App\View::e($proj['role'] ?? 'Developer') ?>
                </div>

                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                    <?= App\View::e($proj['summary']) ?>
                </p>
            </div>

            <div>
                <div class="flex flex-wrap gap-1.5 pt-4 border-t border-gray-100 dark:border-gray-800 mb-4">
                    <?php foreach ($proj['tags'] ?? [] as $tag): ?>
                    <span class="px-2 py-0.5 text-xs font-mono rounded bg-gray-100 dark:bg-darkbg text-gray-600 dark:text-gray-300"><?= App\View::e($tag) ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="flex items-center justify-between">
                    <a href="/projects/<?= App\View::e($proj['slug']) ?>" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 dark:text-brand-400 hover:underline">
                        <span>프로젝트 상세 분석 읽기</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <?php if (!empty($proj['github'])): ?>
                    <a href="<?= App\View::e($proj['github']) ?>" target="_blank" class="text-xs text-gray-400 hover:text-white transition-colors" title="GitHub">
                        GitHub ↗
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
