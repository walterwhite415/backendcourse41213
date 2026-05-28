<?php

function viewer($sort='id', $p=1)
{
    require 'config.php';

    $limit = 10;

    $start = ($p - 1) * $limit;

    $query = "
    SELECT *
    FROM contacts
    ORDER BY $sort
    LIMIT $start, $limit
    ";

    $res = mysqli_query($mysqli, $query);

    $html = "
    <table border='1' cellpadding='5'>
    ";

    $html .= "
    <tr>

        <th>Фамилия</th>

        <th>Имя</th>

        <th>Отчество</th>

        <th>Пол</th>

        <th>Дата рождения</th>

        <th>Телефон</th>

        <th>Адрес</th>

        <th>Email</th>

        <th>Комментарий</th>

    </tr>
    ";

    while ($row = mysqli_fetch_assoc($res)) {

        $html .= "<tr>";

        $html .= "<td>{$row['surname']}</td>";

        $html .= "<td>{$row['name']}</td>";

        $html .= "<td>{$row['lastname']}</td>";

        $html .= "<td>{$row['gender']}</td>";

        $html .= "<td>{$row['date']}</td>";

        $html .= "<td>{$row['phone']}</td>";

        $html .= "<td>{$row['location']}</td>";

        $html .= "<td>{$row['email']}</td>";

        $html .= "<td>{$row['comment']}</td>";

        $html .= "</tr>";
    }

    $html .= "</table>";

    $count = mysqli_query(
        $mysqli,
        "SELECT COUNT(*) as c FROM contacts"
    );

    $count = mysqli_fetch_assoc($count)['c'];

    $pages = ceil($count / $limit);

    $html .= "<br>";

    for ($i=1; $i <= $pages; $i++) {

        $html .= "
        <a class='page'
           href='index.php?page=view&sort=$sort&p=$i'>
           $i
        </a>
        ";
    }

    return $html;
}
?>