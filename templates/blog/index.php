<?php
$getCategoryStyle = function(string $category): array {
    $cat = strtolower(trim($category));
    return match (true) {
        str_contains($cat, 'arch') => [
            'badge' => 'bg-indigo-500/10 text-indigo-500 dark:text-indigo-400 border-indigo-500/20',
            'gradient' => 'from-indigo-500 to-purple-600',
            'borderHover' => 'group-hover:border-indigo-500/60',
            'icon' => '🏛️'
        ],
        str_contains($cat, 'tech') || str_contains($cat, 'review') => [
            'badge' => 'bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border-cyan-500/20',
            'gradient' => 'from-cyan-500 to-blue-600',
            'borderHover' => 'group-hover:border-cyan-500/60',
            'icon' => '⚡'
        ],
        str_contains($cat, 'retro') || str_contains($cat, 'career') => [
            'badge' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20',
            'gradient' => 'from-amber-500 to-orange-600',
            'borderHover' => 'group-hover:border-amber-500/60',
            'icon' => '🧗'
        ],
        default => [
            'badge' => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20',
            'gradient' => 'from-emerald-500 to-teal-600',
            'borderHover' => 'group-hover:border-emerald-500/60',
            'icon' => '💡'
        ]
    };
};

$featuredPost = $blogPosts[0] ?? null;
$remainingPosts = array_slice($blogPosts, 1);
?>

<div class="space-y-10">
    <!-- Header with Breadcrumb & Intro -->
    <header class="border-b border-gray-200 dark:border-borderbg pb-8">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/10 text-brand-600 dark:text-brand-400 border border-brand-500/20 mb-3">
            <span>✍️</span>
            <span>ENGINEERING LOG &amp; THOUGHTS</span>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-gray-900 dark:text-white tracking-tight">
            기술 블로그
        </h1>
        <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 mt-3 max-w-3xl leading-relaxed">
            분산 아키텍처, 성능 튜닝, 백엔드 엔지니어링 실무 경험과 개발자로서의 진솔한 회고를 기록합니다.
        </p>

        <!-- Interactive Search & Category Filter Toolbar -->
        <div class="mt-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center gap-2" id="categoryFilterContainer">
                <?php foreach ($categories as $catName => $count): ?>
                <button type="button" 
                        data-category="<?= App\View::e($catName) ?>"
                        class="category-filter-btn px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-all border <?= $catName === '전체' ? 'active bg-brand-600 text-white border-brand-600 shadow-sm shadow-brand-500/20' : 'bg-white dark:bg-cardbg text-gray-600 dark:text-gray-400 border-gray-200 dark:border-borderbg hover:border-gray-300 dark:hover:border-gray-700' ?>">
                    <span><?= App\View::e($catName) ?></span>
                    <span class="ml-1 text-[11px] opacity-75">(<?= $count ?>)</span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Search Input -->
            <div class="relative w-full md:w-72">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" 
                       id="blogSearchInput" 
                       placeholder="제목, 내용, 태그 검색..." 
                       class="w-full pl-9 pr-8 py-2 rounded-xl text-xs bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all">
                <button type="button" id="clearSearchBtn" class="hidden absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 text-xs">
                    ✕
                </button>
            </div>
        </div>
    </header>

    <!-- No Results Placeholder -->
    <div id="noResultsBox" class="hidden text-center py-16 px-4 rounded-3xl bg-white dark:bg-cardbg border border-gray-200 dark:border-borderbg">
        <span class="text-4xl mb-3 block">🔍</span>
        <h3 class="text-base font-bold text-gray-900 dark:text-white">검색 조건에 맞는 글이 없습니다</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">다른 검색어를 입력하시거나 카테고리 필터를 변경해 보세요.</p>
        <button type="button" id="resetFiltersBtn" class="mt-4 px-4 py-2 text-xs font-semibold rounded-xl bg-brand-600 text-white hover:bg-brand-500 transition-colors">
            전체 글 보기
        </button>
    </div>

    <!-- Posts Container -->
    <div id="postsListWrapper" class="space-y-8">
        <?php if ($featuredPost): 
            $fStyle = $getCategoryStyle($featuredPost['category'] ?? 'Tech');
        ?>
        <!-- 1. Featured Top Story -->
        <div class="featured-post-item" 
             data-category="<?= App\View::e($featuredPost['category'] ?? 'Tech') ?>"
             data-search="<?= strtolower(App\View::e($featuredPost['title'] . ' ' . $featuredPost['summary'] . ' ' . implode(' ', $featuredPost['tags'] ?? []))) ?>">
            <div class="relative group rounded-3xl p-1 bg-gradient-to-r <?= $fStyle['gradient'] ?> opacity-95 hover:opacity-100 transition-all duration-300 shadow-xl">
                <article class="rounded-[22px] bg-white dark:bg-darkbg p-6 sm:p-8 flex flex-col justify-between h-full transition-transform duration-300">
                    <div>
                        <!-- Meta Top -->
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold tracking-wide uppercase border <?= $fStyle['badge'] ?> flex items-center gap-1.5">
                                    <span><?= $fStyle['icon'] ?></span>
                                    <span><?= App\View::e($featuredPost['category'] ?? 'Tech') ?></span>
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-gradient-to-r from-pink-500 to-purple-500 text-white shadow-sm">
                                    FEATURED
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400 font-medium">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <time datetime="<?= App\View::e($featuredPost['date']) ?>"><?= App\View::e($featuredPost['date']) ?></time>
                                </span>
                                <span>•</span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>약 <?= App\View::e($featuredPost['reading_time']) ?>분 읽기</span>
                                </span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight mb-3 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">
                            <a href="/blog/<?= App\View::e($featuredPost['slug']) ?>">
                                <?= App\View::e($featuredPost['title']) ?>
                            </a>
                        </h2>

                        <!-- Excerpt -->
                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed mb-6 line-clamp-3">
                            <?= App\View::e($featuredPost['summary']) ?>
                        </p>
                    </div>

                    <!-- Footer Tags & CTA -->
                    <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-gray-100 dark:border-gray-800">
                        <div class="flex flex-wrap gap-1.5">
                            <?php foreach ($featuredPost['tags'] ?? [] as $tag): ?>
                            <span class="px-2.5 py-1 text-xs font-mono rounded-lg bg-gray-100 dark:bg-cardbg text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-borderbg">#<?= App\View::e($tag) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <a href="/blog/<?= App\View::e($featuredPost['slug']) ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-brand-600 text-white hover:bg-brand-500 shadow-md shadow-brand-500/20 group-hover:gap-3 transition-all">
                            <span>글 전문 읽기</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
        <?php endif; ?>

        <!-- 2. Grid Cards for Other Posts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="gridCardsContainer">
            <?php foreach ($remainingPosts as $post): 
                $pStyle = $getCategoryStyle($post['category'] ?? 'Tech');
            ?>
            <article class="post-card group relative flex flex-col justify-between p-6 sm:p-7 rounded-3xl bg-white dark:bg-cardbg border border-gray-200/90 dark:border-borderbg hover:shadow-xl hover:-translate-y-1 <?= $pStyle['borderHover'] ?> transition-all duration-300"
                     data-category="<?= App\View::e($post['category'] ?? 'Tech') ?>"
                     data-search="<?= strtolower(App\View::e($post['title'] . ' ' . $post['summary'] . ' ' . implode(' ', $post['tags'] ?? []))) ?>">
                
                <div>
                    <!-- Meta Header -->
                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wide uppercase border <?= $pStyle['badge'] ?> flex items-center gap-1">
                            <span><?= $pStyle['icon'] ?></span>
                            <span><?= App\View::e($post['category'] ?? 'Tech') ?></span>
                        </span>

                        <div class="flex items-center gap-2">
                            <time datetime="<?= App\View::e($post['date']) ?>"><?= App\View::e($post['date']) ?></time>
                            <span>•</span>
                            <span><?= App\View::e($post['reading_time']) ?>분</span>
                        </div>
                    </div>

                    <!-- Post Title -->
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white tracking-tight mb-2 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors leading-snug">
                        <a href="/blog/<?= App\View::e($post['slug']) ?>">
                            <?= App\View::e($post['title']) ?>
                        </a>
                    </h3>

                    <!-- Summary -->
                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4 line-clamp-3">
                        <?= App\View::e($post['summary']) ?>
                    </p>
                </div>

                <!-- Footer with Tags & Read Link -->
                <div class="pt-4 border-t border-gray-100 dark:border-gray-800/80 flex items-center justify-between gap-3">
                    <div class="flex flex-wrap gap-1">
                        <?php foreach (array_slice($post['tags'] ?? [], 0, 3) as $tag): ?>
                        <span class="px-2 py-0.5 text-[11px] font-mono rounded bg-gray-100 dark:bg-darkbg text-gray-600 dark:text-gray-400">#<?= App\View::e($tag) ?></span>
                        <?php endforeach; ?>
                    </div>

                    <a href="/blog/<?= App\View::e($post['slug']) ?>" class="inline-flex items-center gap-1 text-xs font-bold text-brand-600 dark:text-brand-400 group-hover:translate-x-1 transition-transform">
                        <span>읽기</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Dynamic Search & Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('blogSearchInput');
    const clearBtn = document.getElementById('clearSearchBtn');
    const categoryBtns = document.querySelectorAll('.category-filter-btn');
    const noResultsBox = document.getElementById('noResultsBox');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    const allPosts = document.querySelectorAll('.featured-post-item, .post-card');

    let currentCategory = '전체';
    let currentSearch = '';

    function filterPosts() {
        let visibleCount = 0;
        const q = currentSearch.trim().toLowerCase();

        allPosts.forEach(post => {
            const postCat = post.getAttribute('data-category') || '';
            const searchData = post.getAttribute('data-search') || '';

            const matchesCategory = (currentCategory === '전체') || (postCat.toLowerCase() === currentCategory.toLowerCase());
            const matchesSearch = !q || searchData.includes(q);

            if (matchesCategory && matchesSearch) {
                post.classList.remove('hidden');
                visibleCount++;
            } else {
                post.classList.add('hidden');
            }
        });

        if (visibleCount === 0) {
            noResultsBox.classList.remove('hidden');
        } else {
            noResultsBox.classList.add('hidden');
        }
    }

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryBtns.forEach(b => {
                b.classList.remove('active', 'bg-brand-600', 'text-white', 'border-brand-600', 'shadow-sm', 'shadow-brand-500/20');
                b.classList.add('bg-white', 'dark:bg-cardbg', 'text-gray-600', 'dark:text-gray-400', 'border-gray-200', 'dark:border-borderbg');
            });
            btn.classList.add('active', 'bg-brand-600', 'text-white', 'border-brand-600', 'shadow-sm', 'shadow-brand-500/20');
            btn.classList.remove('bg-white', 'dark:bg-cardbg', 'text-gray-600', 'dark:text-gray-400', 'border-gray-200', 'dark:border-borderbg');

            currentCategory = btn.getAttribute('data-category');
            filterPosts();
        });
    });

    searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value;
        if (currentSearch.length > 0) {
            clearBtn.classList.remove('hidden');
        } else {
            clearBtn.classList.add('hidden');
        }
        filterPosts();
    });

    clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        currentSearch = '';
        clearBtn.classList.add('hidden');
        filterPosts();
        searchInput.focus();
    });

    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', () => {
            searchInput.value = '';
            currentSearch = '';
            clearBtn.classList.add('hidden');
            if (categoryBtns[0]) categoryBtns[0].click();
        });
    }

    // Support URL param e.g. /blog?category=Architecture
    const urlParams = new URLSearchParams(window.location.search);
    const catParam = urlParams.get('category') || urlParams.get('tag');
    if (catParam) {
        categoryBtns.forEach(btn => {
            if (btn.getAttribute('data-category').toLowerCase() === catParam.toLowerCase()) {
                btn.click();
            }
        });
    }
});
</script>
