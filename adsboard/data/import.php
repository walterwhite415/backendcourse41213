<?php

require __DIR__ . '/../src/settings.php';

$dbOptions = (require __DIR__ . '/../src/settings.php')['db'];
$pdo = new PDO(
    'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
    $dbOptions['user'],
    $dbOptions['password']
);
$pdo->exec('SET NAMES UTF8');

$json = file_get_contents(__DIR__ . '/ads.json');
$ads = json_decode($json, true);

foreach ($ads as $ad) {
    $sth = $pdo->prepare('INSERT INTO ads (title, text, price, category) VALUES (:title, :text, :price, :category)');
    $sth->execute([
        ':title'    => $ad['title'],
        ':text'     => $ad['text'],
        ':price'    => $ad['price'],
        ':category' => $ad['category'],
    ]);
}

echo 'Импорт завершён. Добавлено записей: ' . count($ads);