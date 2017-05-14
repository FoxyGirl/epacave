<?php
require_once 'functions.php';
require_once 'data.php';

session_start();

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

$page_title = 'Главная';

$main_data = [
    'categories' =>  $categories,
    'lots' => $lots,
    'lot_time_remaining' => $lot_time_remaining
];

//<!-- Header -->
echo includeTemplate('tmpl-header.php', ['page_title' => $page_title]);

//<!-- Main -->
echo includeTemplate('tmpl-main.php', $main_data);

//<!-- Footer -->
echo includeTemplate('tmpl-footer.php', $footer_data);