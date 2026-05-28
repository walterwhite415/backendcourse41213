<?php

require 'config.php';

$button = "Сохранить";

$id = $_GET['id'] ?? 1;

$list = mysqli_query(
    $mysqli,
    "SELECT * FROM contacts ORDER BY surname,name"
);

while ($item = mysqli_fetch_assoc($list)) {

    $class = ($item['id'] == $id)
        ? "style='color:red'"
        : "";

    echo "
    <a $class
       href='index.php?page=edit&id={$item['id']}'>
       {$item['surname']} {$item['name']}
    </a><br>
    ";
}

$res = mysqli_query(
    $mysqli,
    "SELECT * FROM contacts WHERE id=$id"
);

$row = mysqli_fetch_assoc($res);

if ($_POST) {

    $query = "
    UPDATE contacts
    SET

    surname='{$_POST['surname']}',
    name='{$_POST['name']}',
    lastname='{$_POST['lastname']}',
    gender='{$_POST['gender']}',
    date='{$_POST['date']}',
    phone='{$_POST['phone']}',
    location='{$_POST['location']}',
    email='{$_POST['email']}',
    comment='{$_POST['comment']}'

    WHERE id=$id
    ";

    mysqli_query($mysqli, $query);

    echo "
    <p style='color:green'>
        Запись обновлена
    </p>
    ";

    $res = mysqli_query(
        $mysqli,
        "SELECT * FROM contacts WHERE id=$id"
    );

    $row = mysqli_fetch_assoc($res);
}

require 'form.php';
?>