<?php
require_once 'functions.php';
require_once 'data.php';

session_start();

$id_lot = $_GET['id'];
$is_id_valid = is_numeric($id_lot) && array_key_exists($id_lot, $lots);

if ( !$is_id_valid ) {
    header("HTTP/1.1 404 Not Found");
    exit('404 Page not found');
}

$page_title = $lots[$id_lot]['name'];

$main_data = [
    'bets' => $bets,
    'id_lot' => $id_lot,
    'lots' => $lots,
    'categories' => $categories
];


//<!-- Header -->
echo includeTemplate('tmpl-header.php', ['id_lot' => $id_lot, 'lots' => $lots, 'page_title' => $page_title]);

//<!-- Main -->
echo includeTemplate('tmpl-main-lot.php', $main_data);

//<!-- Footer -->
echo includeTemplate('tmpl-footer.php', $footer_data);

