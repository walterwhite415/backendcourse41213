<?php

function menu()
{
    $page = $_GET['page'] ?? 'view';

    $sort = $_GET['sort'] ?? 'id';

    $items = [

        'view' => 'Просмотр',

        'add' => 'Добавление записи',

        'edit' => 'Редактирование записи',

        'delete' => 'Удаление записи',

       
    ];

    $html = "";

    foreach ($items as $key => $value) {

        $class = ($page == $key)
            ? 'active'
            : 'btn';

        $html .= "
        <a class='$class'
           href='index.php?page=$key'>
           $value
        </a>
        ";
    }

$html .= "
        <a class='$class'
           href='../index.php'>
           Назад
        </a>
        ";

    if ($page == 'view') {

        $sorts = [

            'id' => 'По добавлению',

            'surname' => 'По фамилии',

            'date' => 'По дате рождения'
        ];

        $html .= "<br><br>";

        foreach ($sorts as $key => $value) {

            $class = ($sort == $key)
                ? 'active-small'
                : 'small';

            $html .= "
            <a class='$class'
               href='index.php?page=view&sort=$key'>
               $value
            </a>
            ";
        }
    }

    return $html;
}
?>