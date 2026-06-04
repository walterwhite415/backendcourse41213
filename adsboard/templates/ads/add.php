<?php include __DIR__ . '/../header.php'; ?>

<h2 style="margin-bottom: 16px; padding:0.5rem">Новое объявление</h2>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="error"><?= $error ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form method="post" style="padding:0.5rem;">
    <label>Заголовок</label>
    <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">

    <label>Текст объявления</label>
    <textarea name="text"><?= htmlspecialchars($_POST['text'] ?? '') ?></textarea>

    <label>Цена (руб., 0 если бесплатно)</label>
    <input type="number" name="price" min="0" value="<?= htmlspecialchars($_POST['price'] ?? '0') ?>">

    <label>Категория</label>
    <select name="category">
        <option value="">-- Выберите категорию --</option>
        <?php foreach (\MyProject\Models\Ads\Ad::$categories as $cat): ?>
            <option value="<?= $cat ?>" <?= (($_POST['category'] ?? '') === $cat) ? 'selected' : '' ?>>
                <?= $cat ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Опубликовать</button>
    <a href="<?= $basePath ?>/" style="margin-left: 16px;">Отмена</a>
</form>

<?php include __DIR__ . '/../footer.php'; ?>