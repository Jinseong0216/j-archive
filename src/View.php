<?php

namespace App;

class View
{
    private static string $templatesDir;

    public static function init(string $templatesDir): void
    {
        self::$templatesDir = rtrim($templatesDir, '/');
    }

    public static function render(string $template, array $data = []): void
    {
        extract($data);

        $templateFile = self::$templatesDir . '/' . ltrim($template, '/') . '.php';

        if (!file_exists($templateFile)) {
            echo "Template [{$template}] not found.";
            return;
        }

        ob_start();
        require $templateFile;
        $content = ob_get_clean();

        // Render layout
        $layoutFile = self::$templatesDir . '/layout.php';
        if (file_exists($layoutFile)) {
            require $layoutFile;
        } else {
            echo $content;
        }
    }

    public static function e(mixed $value): string
    {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}
