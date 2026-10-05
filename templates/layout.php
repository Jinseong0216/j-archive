<!DOCTYPE html>
<html lang="ko" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? App\View::e($title) . ' | ' : '' ?><?= App\View::e($profile['name'] ?? 'Jinseong Choi') ?></title>
    <meta name="description" content="<?= App\View::e($profile['bio'] ?? 'Software Engineer Portfolio') ?>">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Pretendard', '-apple-system', 'BlinkMacSystemFont', 'system-ui', 'sans-serif'],
                        mono: ['JetBrains Mono', 'Fira Code', 'monospace']
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        },
                        darkbg: '#0a0f1d',
                        cardbg: '#111827',
                        borderbg: '#1f2937'
                    }
                }
            }
        }
    </script>
    <!-- Prism.js Syntax Highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <style>
        body { font-family: 'Pretendard', sans-serif; }
        .prose pre { background-color: #111827 !important; border: 1px solid #1f2937; }
        .prose code { color: #818cf8; font-family: 'JetBrains Mono', monospace; font-size: 0.9em; }
        .prose a { color: #818cf8; text-decoration: none; border-bottom: 1px solid rgba(129, 140, 248, 0.4); }
        .prose a:hover { border-bottom-color: #818cf8; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-darkbg dark:text-gray-100 min-h-screen flex flex-col transition-colors duration-200">
    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/80 dark:bg-darkbg/80 border-b border-gray-200 dark:border-gray-800 transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-600 to-indigo-400 flex items-center justify-center text-white font-bold text-lg shadow-sm group-hover:scale-105 transition-transform">
                    JC
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-base tracking-tight text-gray-900 dark:text-white"><?= App\View::e($profile['name'] ?? '최진성') ?></span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Software Engineer</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-1 text-sm font-medium">
                <a href="/" class="px-3 py-1.5 rounded-lg transition-colors <?= ($currentRoute ?? '') === 'home' ? 'text-brand-600 dark:text-brand-400 font-semibold bg-indigo-50 dark:bg-indigo-950/40' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800/60' ?>">소개 (Home)</a>
                <a href="/resume" class="px-3 py-1.5 rounded-lg transition-colors <?= ($currentRoute ?? '') === 'resume' ? 'text-brand-600 dark:text-brand-400 font-semibold bg-indigo-50 dark:bg-indigo-950/40' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800/60' ?>">경력 & 이력서 (Career)</a>
                <a href="/projects" class="px-3 py-1.5 rounded-lg transition-colors <?= ($currentRoute ?? '') === 'projects' ? 'text-brand-600 dark:text-brand-400 font-semibold bg-indigo-50 dark:bg-indigo-950/40' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800/60' ?>">프로젝트 (Projects)</a>
                <a href="/blog" class="px-3 py-1.5 rounded-lg transition-colors <?= ($currentRoute ?? '') === 'blog' ? 'text-brand-600 dark:text-brand-400 font-semibold bg-indigo-50 dark:bg-indigo-950/40' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800/60' ?>">기술 블로그 (Blog)</a>
            </nav>

            <!-- Actions (Theme Toggle & GitHub) -->
            <div class="flex items-center gap-2">
                <button id="themeToggle" class="p-2 rounded-lg text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" aria-label="Toggle theme">
                    <svg id="moonIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
                <a href="mailto:<?= App\View::e($profile['email'] ?? 'pnum4095@gmail.com') ?>" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-lg bg-brand-600 hover:bg-brand-700 text-white shadow-sm transition-colors">
                    <span>Contact</span>
                </a>
            </div>
        </div>
        <!-- Mobile Nav bar -->
        <div class="md:hidden flex items-center justify-around border-t border-gray-200 dark:border-gray-800 py-2 px-2 text-xs">
            <a href="/" class="px-2 py-1 rounded <?= ($currentRoute ?? '') === 'home' ? 'text-brand-500 font-bold' : 'text-gray-500' ?>">홈</a>
            <a href="/resume" class="px-2 py-1 rounded <?= ($currentRoute ?? '') === 'resume' ? 'text-brand-500 font-bold' : 'text-gray-500' ?>">경력/이력서</a>
            <a href="/projects" class="px-2 py-1 rounded <?= ($currentRoute ?? '') === 'projects' ? 'text-brand-500 font-bold' : 'text-gray-500' ?>">프로젝트</a>
            <a href="/blog" class="px-2 py-1 rounded <?= ($currentRoute ?? '') === 'blog' ? 'text-brand-500 font-bold' : 'text-gray-500' ?>">블로그</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow max-w-5xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-200 dark:border-gray-800/80 bg-white dark:bg-cardbg/40 text-gray-500 dark:text-gray-400 py-8 text-xs transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span>© <?= date('Y') ?> <?= App\View::e($profile['name'] ?? 'Jinseong Choi') ?>. All rights reserved.</span>
            </div>
            <div class="flex items-center gap-4 text-gray-400">
                <span>Built with <strong class="text-indigo-400">PHP 8.3</strong> &amp; Markdown</span>
                <span>•</span>
                <a href="<?= App\View::e($profile['github'] ?? '#') ?>" target="_blank" class="hover:text-white transition-colors">GitHub</a>
                <span>•</span>
                <a href="mailto:<?= App\View::e($profile['email'] ?? '') ?>" class="hover:text-white transition-colors">Email</a>
            </div>
        </div>
    </footer>

    <!-- Prism Syntax Highlighting JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>

    <!-- Dark Mode Toggle Script -->
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');

        function applyTheme(isDark) {
            if (isDark) {
                document.documentElement.classList.add('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        }

        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = savedTheme ? savedTheme === 'dark' : true; // Default dark
        applyTheme(isDark);

        themeToggle.addEventListener('click', () => {
            const currentlyDark = document.documentElement.classList.contains('dark');
            const nextDark = !currentlyDark;
            applyTheme(nextDark);
            localStorage.setItem('theme', nextDark ? 'dark' : 'light');
        });
    </script>
</body>
</html>
