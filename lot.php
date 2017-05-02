<?php
require_once 'functions.php';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) . ' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) . ' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) . ' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];



$main_data = [
    'bets' => $bets
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?=includeTemplate('templates/header.php', []); ?>
<!--  -->

<!-- Main -->
<?=includeTemplate('templates/main-lot.php', $main_data); ?>
<!--  -->

<!-- Footer -->
<?=includeTemplate('templates/footer.php', []); ?>
<!--  -->

</body>
</html>
