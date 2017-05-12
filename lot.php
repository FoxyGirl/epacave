<?php
require_once 'functions.php';
require_once 'data.php';

$id_lot = $_GET['id'];
$is_id_valid = is_numeric($id_lot) && array_key_exists($id_lot, $lots);

if ( !$is_id_valid ) {
    header("HTTP/1.1 404 Not Found");
    exit('404 Page not found');
}

$main_data = [
    'bets' => $bets,
    'id_lot' => $id_lot,
    'lots' => $lots,
    'categories' => $categories
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
<?=includeTemplate('tmpl-header.php', []); ?>
<!--  -->

<!-- Main -->
<?=includeTemplate('tmpl-main-lot.php', $main_data); ?>
<!--  -->

<!-- Footer -->
<?=includeTemplate('tmpl-footer.php', $footer_data); ?>
<!--  -->

</body>
</html>
