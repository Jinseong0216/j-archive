<?php
$catName = $post['category'] ?? 'Tech';
$cat = strtolower(trim($catName));
$catBadge = match (true) {
    str_contains($cat, 'arch') => 'bg-indigo-500/10 text-indigo-500 dark:text-indigo-400 border-indigo-500/20',
    str_contains($cat, 'tech') || str_contains($cat, 'review') => 'bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border-cyan-500/20',
    str_contains($cat, 'retro') || str_contains($cat, 'career') => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20',
    default => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20'
};
?>

<!-- Reading Scroll Progress Bar -->
<div id="readProgressBar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-brand-500 via-purple-500 to-pink-500 z-[100] transition-all duration-75" style="width: 0%"></div>

<article class="max-w-3xl mx-auto space-y-10">
    <!-- Top Action Nav -->
    <div class="flex items-center justify-between text-xs pt-2">
        <a href="/blog" class="inline-flex items-center gap-1.5 font-semibold text-gray-500 hover:text-brand-600 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>블로그 목록으로</span>
        </a>

        <div class="flex items-center gap-2">
            <button type="button" id="copyShareBtn" class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-cardbg dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-borderbg font-medium flex items-center gap-1.5 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                <span id="copyShareText">링크 복사</span>
            </button>
        </div>
    </div>

    <!-- Article Header -->
    <header class="border-b border-gray-200 dark:border-borderbg pb-8 space-y-4">
        <div class="flex flex-wrap items-center gap-2.5 text-xs">
            <span class="px-3 py-1 rounded-full font-bold uppercase tracking-wider border <?= $catBadge ?>">
                <?= App\View::e($catName) ?>
            </span>
            <span class="text-gray-300 dark:text-gray-700">•</span>
            <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 font-mono">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <time datetime="<?= App\View::e($post['date']) ?>"><?= App\View::e($post['date']) ?></time>
            </div>
            <span class="text-gray-300 dark:text-gray-700">•</span>
            <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>약 <?= App\View::e($post['reading_time']) ?>분 읽기</span>
            </div>
        </div>

        <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white tracking-tight leading-tight">
            <?= App\View::e($post['title']) ?>
        </h1>

        <?php if (!empty($post['summary'])): ?>
        <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-normal bg-gray-50 dark:bg-cardbg/50 p-4 rounded-2xl border-l-4 border-brand-500">
            <?= App\View::e($post['summary']) ?>
        </p>
        <?php endif; ?>

        <div class="flex flex-wrap gap-1.5 pt-2">
            <?php foreach ($post['tags'] ?? [] as $tag): ?>
            <a href="/blog?tag=<?= urlencode($tag) ?>" class="px-2.5 py-0.5 text-xs font-mono rounded-lg bg-gray-100 dark:bg-cardbg text-gray-600 dark:text-gray-400 hover:text-brand-500 border border-gray-200 dark:border-borderbg transition-colors">
                #<?= App\View::e($tag) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </header>

    <!-- Post Body (Markdown Rendered HTML with Prose Styling) -->
    <div id="articleContent" class="prose prose-base sm:prose-lg dark:prose-invert max-w-none py-2 prose-headings:font-bold prose-headings:tracking-tight prose-h2:border-b prose-h2:border-gray-200 dark:prose-h2:border-gray-800 prose-h2:pb-2 prose-h2:mt-10 prose-h3:mt-8 prose-img:rounded-2xl prose-img:shadow-lg">
        <?= $post['content_html'] ?>
    </div>

    <!-- Author Profile Box -->
    <section class="mt-14 p-6 sm:p-7 rounded-3xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-5">
        <div class="relative w-20 h-20 rounded-2xl overflow-hidden ring-2 ring-indigo-500/40 shadow-lg flex-shrink-0 bg-gray-900">
            <img src="/images/avatar.jpg" alt="<?= App\View::e($profile['name']) ?>" class="w-full h-full object-cover">
        </div>
        <div class="flex-grow text-center sm:text-left space-y-1">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h3 class="font-extrabold text-base text-gray-900 dark:text-white"><?= App\View::e($profile['name']) ?></h3>
                    <p class="text-xs text-brand-600 dark:text-brand-400 font-medium"><?= App\View::e($profile['title']) ?></p>
                </div>
                <div class="flex items-center justify-center sm:justify-end gap-3 text-xs text-gray-500 dark:text-gray-400">
                    <a href="/resume" class="hover:text-brand-500 font-semibold underline underline-offset-2">이력서 보기</a>
                    <span>•</span>
                    <a href="mailto:<?= App\View::e($profile['email'] ?? '') ?>" class="hover:text-brand-500">문의하기</a>
                </div>
            </div>
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 leading-relaxed pt-2">
                <?= App\View::e($profile['bio']) ?>
            </p>
        </div>
    </section>

    <!-- Prev & Next Article Navigation Cards -->
    <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-6 border-t border-gray-200 dark:border-borderbg">
        <?php if (!empty($prevPost)): ?>
        <a href="/blog/<?= App\View::e($prevPost['slug']) ?>" class="group p-5 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 transition-all flex flex-col justify-between">
            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1 group-hover:-translate-x-1 transition-transform">
                ← 이전 글 (Older)
            </span>
            <span class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors line-clamp-2">
                <?= App\View::e($prevPost['title']) ?>
            </span>
        </a>
        <?php else: ?>
        <div class="p-5 rounded-2xl bg-gray-50 dark:bg-cardbg/30 border border-dashed border-gray-200 dark:border-borderbg text-gray-400 text-xs flex items-center">
            첫 번째 글입니다.
        </div>
        <?php endif; ?>

        <?php if (!empty($nextPost)): ?>
        <a href="/blog/<?= App\View::e($nextPost['slug']) ?>" class="group p-5 rounded-2xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg hover:border-brand-500 dark:hover:border-brand-500 transition-all flex flex-col justify-between text-right">
            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1 flex items-center justify-end gap-1 group-hover:translate-x-1 transition-transform">
                다음 글 (Newer) →
            </span>
            <span class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors line-clamp-2">
                <?= App\View::e($nextPost['title']) ?>
            </span>
        </a>
        <?php else: ?>
        <div class="p-5 rounded-2xl bg-gray-50 dark:bg-cardbg/30 border border-dashed border-gray-200 dark:border-borderbg text-gray-400 text-xs flex items-center justify-end">
            가장 최신 글입니다.
        </div>
        <?php endif; ?>
    </section>

    <!-- Bottom Footer Navigation -->
    <div class="pt-4 flex justify-between items-center text-xs">
        <a href="/blog" class="font-bold text-brand-600 dark:text-brand-400 hover:underline">
            ← 블로그 전체 목록으로 이동
        </a>
        <button type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors flex items-center gap-1">
            <span>맨 위로</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
        </button>
    </div>
</article>

<!-- Script for Scroll Progress, Copy Code and Share -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Reading Progress Bar
    const progressBar = document.getElementById('readProgressBar');
    window.addEventListener('scroll', () => {
        const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (totalHeight > 0) {
            const progress = (window.scrollY / totalHeight) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
        }
    });

    // 2. Share / Link Copy
    const copyShareBtn = document.getElementById('copyShareBtn');
    const copyShareText = document.getElementById('copyShareText');
    if (copyShareBtn) {
        copyShareBtn.addEventListener('click', async () => {
            try {
                await navigator.clipboard.writeText(window.location.href);
                copyShareText.textContent = '복사 완료! ✓';
                copyShareBtn.classList.add('bg-emerald-500/20', 'text-emerald-500', 'border-emerald-500/40');
                setTimeout(() => {
                    copyShareText.textContent = '링크 복사';
                    copyShareBtn.classList.remove('bg-emerald-500/20', 'text-emerald-500', 'border-emerald-500/40');
                }, 2000);
            } catch (err) {
                prompt('이 글의 링크를 복사하세요:', window.location.href);
            }
        });
    }

    // 3. Enhance Code Blocks with Copy Button
    const codeBlocks = document.querySelectorAll('pre');
    codeBlocks.forEach(pre => {
        const wrapper = document.createElement('div');
        wrapper.className = 'relative group my-4 rounded-2xl overflow-hidden border border-gray-800 shadow-xl';
        pre.parentNode.insertBefore(wrapper, pre);
        
        // Header bar with window dots
        const header = document.createElement('div');
        header.className = 'flex items-center justify-between px-4 py-2 bg-gray-900 border-b border-gray-800 text-[11px] font-mono text-gray-400 select-none';
        header.innerHTML = `
            <div class="flex items-center gap-1.5">
                <span class="w-2.5 h-2.5 rounded-full bg-red-500/80"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-green-500/80"></span>
                <span class="ml-2 text-gray-400">code snippet</span>
            </div>
            <button type="button" class="copy-code-btn px-2 py-0.5 rounded text-gray-400 hover:text-white hover:bg-gray-800 transition-colors flex items-center gap-1 text-[11px]">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                <span>복사</span>
            </button>
        `;
        
        wrapper.appendChild(header);
        wrapper.appendChild(pre);

        const copyBtn = header.querySelector('.copy-code-btn');
        copyBtn.addEventListener('click', async () => {
            const code = pre.querySelector('code')?.innerText || pre.innerText;
            try {
                await navigator.clipboard.writeText(code);
                copyBtn.innerHTML = '<span>복사됨! ✓</span>';
                copyBtn.classList.add('text-emerald-400');
                setTimeout(() => {
                    copyBtn.innerHTML = `
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span>복사</span>
                    `;
                    copyBtn.classList.remove('text-emerald-400');
                }, 2000);
            } catch (e) {
                console.error(e);
            }
        });
    });
});
</script>
