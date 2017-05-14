<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 03.05.2017
 * Time: 16:33
 */
require_once 'functions.php';
require_once 'data.php';

session_start();

if ( !$_SESSION['user'] ) {
    header("HTTP/1.1 403 Forbidden");
    exit('ERROR 403 Forbidden');
}

$form_valid = '';
$form_validate = [];
$form_validate['file_error'] = '';

if (isset($_POST)) {
    array_walk($_POST, 'check_input');
    array_walk($_POST, 'check_form');
}

if (isset($_FILES['photo2']) && $_FILES['photo2']['name'] != '') {
    $file = $_FILES['photo2'];
    $upload_dir = 'img/';
    $name_file = basename($file['name']);

//    print("Загружен файл с именем " . $file['name'] . " и размером " . $file['size'] . " байт и с типом " . $file['type']
//        . ", а также временным именем " . $file['tmp_name'] . " и базовым именем " . $name_file);
//    print('Ошибка файла = ' . $form_validate['file_error']);

    if ($file['error'] == UPLOAD_ERR_OK && is_uploaded_file($file['tmp_name'])) {
        if (in_array($file['type'], $upload_img_file_types)) {
            $tmp_name = $file['tmp_name'];
            $name_file = $upload_dir . basename($file['name']);
            move_uploaded_file($tmp_name, $name_file);
            $url_img = $name_file;
        } else {
            $form_validate['file_error'] = 'Допускается загрузка только jpeg, jpg и png';
        }

    } else {
        $form_validate['file_error'] = 'Код ошибки загрузки файла ' . $file['error'];
    }
}

$form_data = [
    'form_valid' => $form_valid,
    'form_validate' => $form_validate,
    'categories' => $categories
];

if ($form_data['form_valid'] == '') {
    $lots[] = [
        "name" => $_POST['lot-name'],
        "category" => $_POST['category'],
        "price" => $_POST['lot-rate'],
        "url_img" => $url_img
    ];
}

$page_title = 'Добавление лота';

$lot_data = [
    'bets' => $bets,
    'id_lot' => 6,
    'lots' => $lots,
    'categories' => $categories
];


//<!-- Header -->
echo includeTemplate('tmpl-header.php', ['page_title' => $page_title]);

//<!-- Main -->
    if (empty($_POST) || $form_data['form_valid'] == 'form--invalid') {
        echo includeTemplate('tmpl-main-add-lot.php', $form_data);
//        print('Форма неверна ' . $form_data['form_valid']);
    }
    else {
        echo includeTemplate('tmpl-main-lot.php', $lot_data);
//        print('Вот ваш лот ' . $form_data['form_valid']);
    }

//<!-- Footer -->
echo includeTemplate('tmpl-footer.php', $footer_data);
