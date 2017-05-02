<?php
require_once 'functions.php';
require_once 'data.php';

$id_lot = $_GET['id'];

$main_data = [
    'bets' => $bets,
    'id_lot' => $id_lot,
    'lots' => $lots
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $lots[$id_lot]['name'] ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?=includeTemplate('header.php', []); ?>
<!--  -->

<!-- Main -->
<?=includeTemplate('main-lot.php', $main_data); ?>
<!--  -->

<!-- Footer -->
<?=includeTemplate('footer.php', []); ?>
<!--  -->

</body>
</html>
