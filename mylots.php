<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 16.05.2017
 * Time: 23:54
 */

require_once 'functions.php';
require_once 'data.php';

session_start();

$page_title = 'Мои ставки';

if (isset($_COOKIE['my_bets'])) {
//    print ($_COOKIE['my_bets']);
    $my_bets = json_decode($_COOKIE['my_bets'], true);
}

function cmp($a, $b) {
    if ($a['time'] == $b['time']) {
        return 0;
    }
    return ($a['time'] < $b['time']) ? 1 : -1;
}

uasort($my_bets, "cmp");

$main_data = [
    'bets' => $bets,
    'id_lot' => $id_lot,
    'lots' => $lots,
    'my_bets' => $my_bets,
    'categories' => $categories
];

//<!-- Header -->
echo includeTemplate('tmpl-header.php', ['id_lot' => $id_lot, 'lots' => $lots, 'page_title' => $page_title]);

//<!-- Main -->
echo includeTemplate('tmpl-my-lots.php', $main_data);

//<!-- Footer -->
echo includeTemplate('tmpl-footer.php', $footer_data);