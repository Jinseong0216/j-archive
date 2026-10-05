<?php

namespace App;

use Parsedown;

class ContentService
{
    private string $baseDir;
    private Parsedown $parsedown;

    public function __construct(string $baseDir)
    {
        $this->baseDir = rtrim($baseDir, '/');
        $this->parsedown = new Parsedown();
        $this->parsedown->setSafeMode(false);
    }

    public function getProfile(): array
    {
        return $this->readJson('data/profile.json');
    }

    public function getCareer(): array
    {
        return $this->readJson('data/career.json');
    }

    public function getSideProjects(): array
    {
        return $this->readJson('data/side_projects.json');
    }

    public function getProjects(): array
    {
        $files = glob($this->baseDir . '/content/projects/*.md') ?: [];
        $projects = [];

        foreach ($files as $file) {
            $parsed = $this->parseMarkdownFile($file);
            if ($parsed) {
                $projects[] = $parsed;
            }
        }

        // Sort by priority/order if available, otherwise by date desc
        usort($projects, function ($a, $b) {
            return ($b['order'] ?? 0) <=> ($a['order'] ?? 0) ?: strcmp($b['date'] ?? '', $a['date'] ?? '');
        });

        return $projects;
    }

    public function getProject(string $slug): ?array
    {
        $path = $this->baseDir . "/content/projects/{$slug}.md";
        return file_exists($path) ? $this->parseMarkdownFile($path) : null;
    }

    public function getBlogPosts(): array
    {
        $files = glob($this->baseDir . '/content/blog/*.md') ?: [];
        $posts = [];

        foreach ($files as $file) {
            $parsed = $this->parseMarkdownFile($file);
            if ($parsed) {
                $posts[] = $parsed;
            }
        }

        usort($posts, function ($a, $b) {
            return strcmp($b['date'] ?? '', $a['date'] ?? '');
        });

        return $posts;
    }

    public function getBlogPost(string $slug): ?array
    {
        $path = $this->baseDir . "/content/blog/{$slug}.md";
        return file_exists($path) ? $this->parseMarkdownFile($path) : null;
    }

    private function readJson(string $relativePath): array
    {
        $fullPath = $this->baseDir . '/' . ltrim($relativePath, '/');
        if (!file_exists($fullPath)) {
            return [];
        }
        $data = json_decode(file_get_contents($fullPath), true);
        return is_array($data) ? $data : [];
    }

    private function parseMarkdownFile(string $filePath): ?array
    {
        if (!file_exists($filePath)) {
            return null;
        }

        $raw = file_get_contents($filePath);
        $slug = basename($filePath, '.md');

        $meta = [
            'slug' => $slug,
            'title' => ucfirst(str_replace('-', ' ', $slug)),
            'date' => date('Y-m-d', filemtime($filePath)),
            'summary' => '',
            'tags' => [],
            'category' => 'General',
            'order' => 0,
        ];
        $body = $raw;

        // Frontmatter parsing: --- meta --- body
        if (preg_match('/^---\s*\n(.*?)\n---\s*\n(.*)$/s', $raw, $matches)) {
            $frontmatterRaw = $matches[1];
            $body = $matches[2];

            $lines = explode("\n", $frontmatterRaw);
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || str_starts_with($line, '#')) {
                    continue;
                }
                if (str_contains($line, ':')) {
                    [$key, $val] = explode(':', $line, 2);
                    $key = trim($key);
                    $val = trim($val, " \t\n\r\0\x0B\"'");

                    if ($key === 'tags') {
                        $meta['tags'] = array_map('trim', explode(',', $val));
                    } elseif ($key === 'order') {
                        $meta['order'] = (int)$val;
                    } else {
                        $meta[$key] = $val;
                    }
                }
            }
        }

        $meta['content_html'] = $this->parsedown->text($body);
        $meta['content_raw'] = $body;
        $meta['reading_time'] = max(1, (int)ceil(str_word_count(strip_tags($meta['content_html'])) / 200));

        return $meta;
    }
}
