<?php
require_once 'functions.php';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = time();

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining = gmdate("H:i", ($tomorrow - $now));

$equipment_types = [
    "Доски и лыжи",
    "Крепления",
    "Ботинки",
    "Одежда",
    "Инструменты",
    "Разное"
];

$advertisements = [
    [
        "name" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => 10999,
        "url_img" => "img/lot-1.jpg"
    ],
    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "url_img" => "img/lot-2.jpg"
    ],
    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "url_img" => "img/lot-3.jpg"
    ],
    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "url_img" => "img/lot-4.jpg"
    ],
    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "url_img" => "img/lot-5.jpg"
    ],
    [
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "url_img" => "img/lot-6.jpg"
    ]
];

$main_data = [
    'equipment_types' =>  $equipment_types,
    'advertisements' => $advertisements,
    'lot_time_remaining' => $lot_time_remaining
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?=includeTemplate('templates/header.php', []); ?>
<!--  -->

<!-- Main -->
<?=includeTemplate('templates/main.php', $main_data); ?>
<!--  -->

<!-- Footer -->
    <?=includeTemplate('templates/footer.php', ['name' => '<h1>Палки</h1>']); ?>
<!--  -->

</body>
</html>