<?php include __DIR__ . '/../header.php'; ?>

<h2 style="margin-bottom: 16px;">Редактировать объявление</h2>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="error"><?= $error ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form method="post">
    <label>Заголовок</label>
    <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? $ad->getTitle()) ?>">

    <label>Текст объявления</label>
    <textarea name="text"><?= htmlspecialchars($_POST['text'] ?? $ad->getText()) ?></textarea>

    <label>Цена (руб., 0 если бесплатно)</label>
    <input type="number" name="price" min="0" value="<?= htmlspecialchars($_POST['price'] ?? $ad->getPrice()) ?>">

    <label>Категория</label>
    <select name="category">
        <option value="">-- Выберите категорию --</option>
        <?php foreach (\MyProject\Models\Ads\Ad::$categories as $cat): ?>
            <option value="<?= $cat ?>" <?= (($_POST['category'] ?? $ad->getCategory()) === $cat) ? 'selected' : '' ?>>
                <?= $cat ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Сохранить</button>
    <a href="<?= $basePath ?>/ads/<?= $ad->getId() ?>" style="margin-left: 16px;">Отмена</a>
</form>

<?php include __DIR__ . '/../footer.php'; ?>