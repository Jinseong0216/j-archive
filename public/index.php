<?php

declare(strict_types=1);

// Built-in PHP server static file handling
if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $file = __DIR__ . $path;
    if ($path !== '/' && is_file($file)) {
        return false;
    }
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\View;
use App\ContentService;

$baseDir = dirname(__DIR__);

// Initialize View and ContentService
View::init($baseDir . '/templates');
$contentService = new ContentService($baseDir);

$router = new Router();

// 1. Home Page (소개 + 하이라이트)
$router->get('/', function () use ($contentService) {
    $profile = $contentService->getProfile();
    $projects = $contentService->getProjects();
    $blogPosts = $contentService->getBlogPosts();
    $sideProjects = $contentService->getSideProjects();

    View::render('home', [
        'title' => '홈',
        'currentRoute' => 'home',
        'profile' => $profile,
        'projects' => $projects,
        'blogPosts' => $blogPosts,
        'sideProjects' => $sideProjects,
    ]);
});

// 2. Resume / Career Page (경력 & 이력서 & 현재직장 & 진행중 프로젝트)
$router->get('/resume', function () use ($contentService) {
    $profile = $contentService->getProfile();
    $career = $contentService->getCareer();
    $sideProjects = $contentService->getSideProjects();

    View::render('resume', [
        'title' => '경력 및 이력서',
        'currentRoute' => 'resume',
        'profile' => $profile,
        'career' => $career,
        'sideProjects' => $sideProjects,
    ]);
});

// 3. Projects List
$router->get('/projects', function () use ($contentService) {
    $profile = $contentService->getProfile();
    $projects = $contentService->getProjects();

    View::render('projects/index', [
        'title' => '프로젝트 목록',
        'currentRoute' => 'projects',
        'profile' => $profile,
        'projects' => $projects,
    ]);
});

// 4. Project Detail
$router->get('/projects/{slug}', function (string $slug) use ($contentService) {
    $project = $contentService->getProject($slug);
    $profile = $contentService->getProfile();

    if (!$project) {
        http_response_code(404);
        View::render('404', [
            'title' => '프로젝트를 찾을 수 없습니다',
            'currentRoute' => 'projects',
            'profile' => $profile,
        ]);
        return;
    }

    View::render('projects/show', [
        'title' => $project['title'],
        'currentRoute' => 'projects',
        'profile' => $profile,
        'project' => $project,
    ]);
});

// 5. Blog List
$router->get('/blog', function () use ($contentService) {
    $profile = $contentService->getProfile();
    $blogPosts = $contentService->getBlogPosts();
    $categories = $contentService->getBlogCategories();

    View::render('blog/index', [
        'title' => '기술 블로그',
        'currentRoute' => 'blog',
        'profile' => $profile,
        'blogPosts' => $blogPosts,
        'categories' => $categories,
    ]);
});

// 6. Blog Post Detail
$router->get('/blog/{slug}', function (string $slug) use ($contentService) {
    $data = $contentService->getBlogPostWithNeighbors($slug);
    $profile = $contentService->getProfile();

    if (!$data || !$data['post']) {
        http_response_code(404);
        View::render('404', [
            'title' => '글을 찾을 수 없습니다',
            'currentRoute' => 'blog',
            'profile' => $profile,
        ]);
        return;
    }

    View::render('blog/show', [
        'title' => $data['post']['title'],
        'currentRoute' => 'blog',
        'profile' => $profile,
        'post' => $data['post'],
        'prevPost' => $data['prev'],
        'nextPost' => $data['next'],
    ]);
});

// Dispatch current request
$router->dispatch($_SERVER['REQUEST_URI'] ?? '/');
