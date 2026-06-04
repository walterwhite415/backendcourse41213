<?php include __DIR__ . '/../header.php'; ?>

<div class="categories">
    <a href="<?= $basePath ?>/" class="<?= $category === '' ? 'active' : '' ?>">Все</a>
    <?php foreach (\MyProject\Models\Ads\Ad::$categories as $cat): ?>
        <a href="<?= $basePath ?>/?category=<?= urlencode($cat) ?>"
           class="<?= $category === $cat ? 'active' : '' ?>">
            <?= $cat ?>
        </a>
    <?php endforeach; ?>
</div>

<?php if (empty($ads)): ?>
    <p style="color:#888;">Объявлений пока нет.</p>
<?php else: ?>
    <?php foreach ($ads as $ad): ?>
        <div class="ad-card">
            <a href="<?= $basePath ?>/ads/<?= $ad->getId() ?>" class="ad-title">
                <?= htmlspecialchars($ad->getTitle()) ?>
            </a>
            <div class="ad-meta">
                <?= htmlspecialchars($ad->getCategory()) ?> &mdash; <?= $ad->getCreatedAt() ?>
            </div>
            <div class="ad-excerpt">
                <?= htmlspecialchars(mb_substr($ad->getText(), 0, 120)) ?>...
            </div>
            <?php if ($ad->getPrice() > 0): ?>
                <div class="ad-price"><?= number_format($ad->getPrice(), 0, '.', ' ') ?> руб.</div>
            <?php else: ?>
                <div class="ad-price free">Бесплатно</div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>