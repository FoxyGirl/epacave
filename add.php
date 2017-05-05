<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 03.05.2017
 * Time: 16:33
 */
require_once 'functions.php';
require_once 'data.php';

$form_valid = 'form--invalid';
$form_validate = [];

if (isset($_POST)) {

    array_walk($_POST, 'check_input');

    $form_valid = 'valid';

    array_walk($_POST, 'check_form');
}

function check_input(&$data, $key) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
//    print($key . ' ' . $data . '<br>');
}

function check_form(&$data, $key)
{
    global $form_validate;
    $error_class = 'form__item--invalid';
    $error_message = 'Заполните это поле';
    $error_message_num = 'Заполните это поле числом больше нуля';

    switch ($key) {
        case 'category':
            if ($data == 'Выберите категорию') {
                dataError($data, $key, $error_class, $error_message);
            } else {
                dataRight($data, $key);
            }
            break;
        case 'photo2':
            dataRight($data, $key);
            break;
        case 'lot-rate':
        case 'lot-step':
            if (!is_numeric($data) || +$data <= 0) {
                $data = '';
                dataError($data, $key, $error_class, $error_message_num);
            } else {
                dataRight($data, $key);
            }
            break;
        default:
            if (empty($data)) {
                dataError($data, $key, $error_class, $error_message);
            } else {
                dataRight($data, $key);
            }
    }

//    print($key . ' ' . $form_validate[$key]['value'] . ' /  ' . $form_validate[$key]['error_class'] . ' /  ' . $form_validate[$key]['error_message'] . '<br>');
}


function dataRight($data = '', $key) {
    global $form_validate;
    $form_validate[$key] = [
        'value' => $data,
        'error_class' => '',
        'error_message' => ''
    ];
}

function dataError($data = '', $key, $error_class, $error_message) {
    global $form_validate, $form_valid;
    $form_valid = 'form--invalid';
    $form_validate[$key] = [
        'value' => $data,
        'error_class' => $error_class,
        'error_message' => $error_message
    ];
}

$form_data = [
    'form_valid' => $form_valid,
    'form_validate' => $form_validate,
    'equipment_types' => $equipment_types
];

if ($form_data['form_valid'] == 'valid') {
    $lot = [
        "name" => $_POST['lot-name'],
        "category" => $_POST['category'],
        "price" => $_POST['lot-rate'],
        "url_img" => $_POST['photo2'],
        "description" => $_POST['message']
    ];
    $lot_new = [
        [
        "name" => $_POST['lot-name'],
        "category" => $_POST['category'],
        "price" => $_POST['lot-rate'],
        "url_img" => $_POST['photo2']
        ]
    ];

}

$lots[] = [
    "name" => $_POST['lot-name'],
    "category" => $_POST['category'],
    "price" => $_POST['lot-rate'],
    "url_img" => $_POST['photo2']
];

$lot_data = [
    'bets' => $bets,
    'id_lot' => 6,
    'lots' => $lots
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление лота</title>
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
        echo includeTemplate('tmpl-main-add-lot.php', $form_data);
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
