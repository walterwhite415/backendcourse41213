<?php include __DIR__ . '/../header.php'; ?>

<h2 style="margin-bottom: 16px;">Удалить объявление</h2>

<p style="margin-bottom: 16px;">
    Вы уверены, что хотите удалить объявление <strong><?= htmlspecialchars($ad->getTitle()) ?></strong>?
</p>

<form method="post">
    <input type="hidden" name="confirm" value="1">
    <button type="submit" class="btn btn-danger" style="margin-right: 8px;">Да, удалить</button>
    <a href="<?= $basePath ?>/ads/<?= $ad->getId() ?>">Отмена</a>
</form>

<?php include __DIR__ . '/../footer.php'; ?>