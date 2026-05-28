<form method="post">

<div class="column">

<div class="add">

<label>Фамилия</label>

<input type="text"
       name="surname"
       value="<?= $row['surname'] ?? '' ?>"    required>
    

</div>

<div class="add">

<label>Имя</label>

<input type="text"
       name="name"
       value="<?= $row['name'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Отчество</label>

<input type="text"
       name="lastname"
       value="<?= $row['lastname'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Пол</label>

<select name="gender">

<option value="мужской"
<?= (($row['gender'] ?? '') == 'мужской')
? 'selected'
: '' ?>>

мужской

</option>

<option value="женский"
<?= (($row['gender'] ?? '') == 'женский')
? 'selected'
: '' ?> >

женский

</option>

</select>

</div>

<div class="add">

<label>Дата рождения</label>

<input type="date"
       name="date"
       value="<?= $row['date'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Телефон</label>

<input type="text"
       name="phone"
       value="<?= $row['phone'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Адрес</label>

<input type="text"
       name="location"
       value="<?= $row['location'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Email</label>

<input type="email"
       name="email"
       value="<?= $row['email'] ?? '' ?>"   required>

</div>

<div class="add">

<label>Комментарий</label>

<textarea name="comment"><?= $row['comment'] ?? '' ?></textarea>

</div>

<button type="submit">

<?= $button ?>

</button>

</div>

</form>