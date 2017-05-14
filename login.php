<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 12.05.2017
 * Time: 22:37
 */

require_once 'functions.php';
require_once 'data.php';

session_start();

$form_valid = '';
$form_validate = [];

if (isset($_POST)) {
    array_walk($_POST, 'check_input');
    array_walk($_POST, 'check_form');
}

if (!empty($_POST) && $form_valid == '') {
    $user = searchUser($_POST['email'], $users);
    if ($user == null) {
        $form_validate['email']['error_message'] = 'Нет такого пользователя!';
        $form_validate['email']['error_class'] = 'form__item--invalid';
    } elseif ($_POST['password'] != '') {
        $isPasswordTrue = password_verify($_POST['password'], $user['password']);

        if (!$isPasswordTrue) {
            $form_validate['password']['error_message'] = 'Неверный пароль!';
            $form_validate['password']['error_class'] = 'form__item--invalid';
            $form_validate['password']['value'] = '';
        } else {
            $_SESSION['user'] = $user;
            header('Location: /index.php');
        }
    }
}

$page_title = 'Вход';

$form_data = [
    'form_valid' => $form_valid,
    'form_validate' => $form_validate,
    'categories' => $categories
];

//<!-- Header -->
echo includeTemplate('tmpl-header.php', ['page_title' => $page_title]);

//<!-- Main -->
echo includeTemplate('tmpl-login.php', $form_data);

//<!-- Footer -->
echo includeTemplate('tmpl-footer.php', $footer_data);

