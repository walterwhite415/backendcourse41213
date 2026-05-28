<?php

require 'menu.php';

$page = $_GET['page'] ?? 'view';

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<link rel="stylesheet" href="../normalize.css">
<link rel="stylesheet" href="../main.css">
<link rel="stylesheet" href="style.css">

<title>notebook</title>

</head>

<body>

<?= menu() ?>

<hr>

<?php

switch ($page) {

    case 'add':

        require 'add.php';

        break;

    case 'edit':

        require 'edit.php';

        break;

    case 'delete':

        require 'delete.php';

        break;

    default:

        require 'viewer.php';

        $sort = $_GET['sort'] ?? 'id';

        $p = $_GET['p'] ?? 1;

        echo viewer($sort, $p);
}

?>

</body>

</html>