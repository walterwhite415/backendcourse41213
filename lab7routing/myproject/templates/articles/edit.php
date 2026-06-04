<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование статьи</h1>

<form method="post">
    <div style="margin-bottom: 12px;">
        <label>Название</label><br>
        <input type="text"
               name="name"
               value="<?= htmlspecialchars($article->getName()) ?>"
               style="width:100%; padding:8px; margin-top:4px;">
    </div>
    <div style="margin-bottom: 12px;">
        <label>Текст</label><br>
        <textarea name="text"
                  rows="6"
                  style="width:100%; padding:8px; margin-top:4px;"><?= htmlspecialchars($article->getText()) ?></textarea>
    </div>
    <button type="submit" style="padding:8px 20px;">Сохранить</button>
    <a href="<?= $basePath ?>/articles/<?= $article->getId() ?>"
       style="margin-left:12px;">Отмена</a>
</form>

<?php include __DIR__ . '/../footer.php'; ?>