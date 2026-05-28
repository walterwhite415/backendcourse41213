<?php

namespace MyProject;

class View
{
    public static function render(string $content, ?string $title = null): void
    {
        require __DIR__ . '/Views/layout.php';
    }
}
