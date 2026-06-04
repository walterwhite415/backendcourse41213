<?php

$mysqli = mysqli_connect( //подключение к бд
    "localhost",
    "root",
    "",
    "notebook"
);

if (mysqli_connect_errno()) {

    die(
        "Ошибка подключения: " .
        mysqli_connect_error()
    );
}
?>
