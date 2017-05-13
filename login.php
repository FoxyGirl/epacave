<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 12.05.2017
 * Time: 22:37
 */

require_once 'functions.php';
require_once 'data.php';

$form_valid = '';
$form_validate = [];

if (isset($_POST)) {
    array_walk($_POST, 'check_input');
    array_walk($_POST, 'check_form');
}

$form_data = [
    'form_valid' => $form_valid,
    'form_validate' => $form_validate,
    'categories' => $categories
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?=includeTemplate('tmpl-header.php', []); ?>
<!--  -->

<!-- Main -->
<?php
if (empty($_POST) || $form_data['form_valid'] == 'form--invalid') {
    echo includeTemplate('tmpl-login.php', $form_data);
//        print('Форма неверна ' . $form_data['form_valid']);
}
else {
    echo includeTemplate('tmpl-main-lot.php', $lot_data);
//        print('Вот ваш лот ' . $form_data['form_valid']);
}
?>

<!--  -->

<!-- Footer -->
<?=includeTemplate('tmpl-footer.php', $footer_data); ?>
<!--  -->

</body>
</html>
