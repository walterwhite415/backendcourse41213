<?php

namespace MyProject\Controllers;

use MyProject\Models\Ads\Ad;
use MyProject\View\View;

class AdsController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $id): void
    {
        $ad = Ad::getById($id);

        if ($ad === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('ads/view.php', ['ad' => $ad]);
    }

    public function add(): void
    {
        $errors = [];

        if (!empty($_POST)) {
            if (empty($_POST['title'])) {
                $errors[] = 'Введите заголовок';
            }
            if (empty($_POST['text'])) {
                $errors[] = 'Введите текст';
            }
            if (!in_array($_POST['category'], Ad::$categories)) {
                $errors[] = 'Выберите категорию';
            }

            if (empty($errors)) {
                $ad = new Ad();
                $ad->setTitle($_POST['title']);
                $ad->setText($_POST['text']);
                $ad->setPrice((int) $_POST['price']);
                $ad->setCategory($_POST['category']);
                $ad->save();

                header('Location: ' . BASE_PATH . '/ads/' . $ad->getId());
                exit;
            }
        }

        $this->view->renderHtml('ads/add.php', ['errors' => $errors]);
    }

    public function edit(int $id): void
    {
        $ad = Ad::getById($id);

        if ($ad === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $errors = [];

        if (!empty($_POST)) {
            if (empty($_POST['title'])) {
                $errors[] = 'Введите заголовок';
            }
            if (empty($_POST['text'])) {
                $errors[] = 'Введите текст';
            }
            if (!in_array($_POST['category'], Ad::$categories)) {
                $errors[] = 'Выберите категорию';
            }

            if (empty($errors)) {
                $ad->setTitle($_POST['title']);
                $ad->setText($_POST['text']);
                $ad->setPrice((int) $_POST['price']);
                $ad->setCategory($_POST['category']);
                $ad->save();

                header('Location: ' . BASE_PATH . '/ads/' . $ad->getId());
                exit;
            }
        }

        $this->view->renderHtml('ads/edit.php', [
            'ad'     => $ad,
            'errors' => $errors,
        ]);
    }

    public function delete(int $id): void
    {
        $ad = Ad::getById($id);

        if ($ad === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if (!empty($_POST) && isset($_POST['confirm'])) {
            $ad->delete();
            header('Location: ' . BASE_PATH . '/');
            exit;
        }

        $this->view->renderHtml('ads/delete.php', ['ad' => $ad]);
    }
}