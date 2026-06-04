<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>
<p class="author">Автор: <strong><?= $article->getAuthor()->getNickname() ?></strong></p>
<p><?= $article->getText() ?></p>
<br>
<a href="<?= $basePath ?>/article/<?= $article->getId() ?>/edit">Редактировать статью</a>

<?php include __DIR__ . '/../footer.php'; ?>