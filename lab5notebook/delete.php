<?php

require 'config.php';

$id = $_GET['id'] ?? 0;

if ($id) {

    $res = mysqli_query(
        $mysqli,
        "SELECT * FROM contacts WHERE id=$id"
    );

    $row = mysqli_fetch_assoc($res);

    mysqli_query(
        $mysqli,
        "DELETE FROM contacts WHERE id=$id"
    );

    echo "
    <p style='color:red'>
        Запись {$row['surname']} удалена
    </p>
    ";
}

$res = mysqli_query(
    $mysqli,
    "SELECT * FROM contacts ORDER BY surname,name"
);

while ($row = mysqli_fetch_assoc($res)) {

    echo "
    <a href='index.php?page=delete&id={$row['id']}'>
        {$row['surname']}
        {$row['name'][0]}.
        {$row['lastname'][0]}.
    </a><br>
    ";
}
?>