<?php include __DIR__ . '/../header.php'; ?>

<h2 style="margin-bottom: 8px;"><?= htmlspecialchars($ad->getTitle()) ?></h2>

<div style="font-size: 13px; color: #999; margin-bottom: 12px;">
    <?= htmlspecialchars($ad->getCategory()) ?> &mdash; <?= $ad->getCreatedAt() ?>
</div>

<p style="margin-bottom: 16px; line-height: 1.6;"><?= nl2br(htmlspecialchars($ad->getText())) ?></p>

<?php if ($ad->getPrice() > 0): ?>
    <div style="font-size: 20px; font-weight: bold; margin-bottom: 16px;">
        <?= number_format($ad->getPrice(), 0, '.', ' ') ?> руб.
    </div>
<?php else: ?>
    <div style="font-size: 20px; margin-bottom: 16px; color: #555;">Бесплатно</div>
<?php endif; ?>

<hr>

<a href="<?= $basePath ?>/ads/<?= $ad->getId() ?>/edit" class="btn" style="margin-right: 8px;">Редактировать</a>
<a href="<?= $basePath ?>/ads/<?= $ad->getId() ?>/delete" class="btn btn-danger">Удалить</a>
<a href="<?= $basePath ?>/" style="margin-left: 16px;">Назад к списку</a>

<?php include __DIR__ . '/../footer.php'; ?>