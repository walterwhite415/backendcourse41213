<?php

namespace MyProject\Controllers;

use MyProject\Models\Ads\Ad;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main(): void
    {
        $category = $_GET['category'] ?? '';

        if ($category && in_array($category, Ad::$categories)) {
            $ads = Ad::findByCategory($category);
        } else {
            $ads = Ad::findAll();
            $category = '';
        }

        $this->view->renderHtml('main/main.php', [
            'ads'      => $ads,
            'category' => $category,
        ]);
    }
}