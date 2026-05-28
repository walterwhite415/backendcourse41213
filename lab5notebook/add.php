<?php

require 'config.php';

$row = [];

$button = "Добавить";

if ($_POST) {

    $query = "
    INSERT INTO contacts
    (
        surname,
        name,
        lastname,
        gender,
        date,
        phone,
        location,
        email,
        comment
    )
    VALUES
    (
        '{$_POST['surname']}',
        '{$_POST['name']}',
        '{$_POST['lastname']}',
        '{$_POST['gender']}',
        '{$_POST['date']}',
        '{$_POST['phone']}',
        '{$_POST['location']}',
        '{$_POST['email']}',
        '{$_POST['comment']}'
    )
    ";

    $res = mysqli_query($mysqli, $query);

    if ($res) {

        echo "
        <p style='color:green'>
            Запись добавлена
        </p>
        ";

    } else {

        echo "
        <p style='color:red'>
            Ошибка добавления
        </p>
        ";
    }
}

require 'form.php';
?>