<?php

namespace MyProject\Controllers;

use MyProject\View;

class MainController
{
    public function main()
    {
        View::render('<h1>Главная страница</h1>');
    }

    public function sayHello(string $name)
    {
        View::render('<h1>Привет, ' . htmlspecialchars($name) . '</h1>', 'Страница приветствия');
    }

    public function sayBye(string $name)
    {
        View::render('<h1>Пока, ' . htmlspecialchars($name) . '</h1>');
    }
}
