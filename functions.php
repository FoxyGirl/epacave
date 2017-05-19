<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 26.04.2017
 * Time: 16:24
 */

// Функция включения шаблонов
// $templ {string} название файла шаблона, лежащего в папке 'templates/'
// $datas {Array} - массив данных, предназначенных для использования в шаблоне
function includeTemplate($templ, $datas = []) {
    $templ = 'templates/' . $templ;
    if (!file_exists($templ)) {
        return "";
    } else {
        if (!empty($datas)) {
            array_walk_recursive($datas, 'protectXSS');
            extract($datas);        //импортируются переменные из массива
        }
        ob_start();                 //включается буферизация
        include $templ;             //подключается шаблон
        return ob_get_clean();      //возарщается заполненный шаблон и очищается буфер
    }
}

// Функция для защиты XSS
// $data {Array} - массив данных, предназначенных для очистки
function protectXSS(&$data) {
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
}

// Функция для обработки вводимых данных
function check_input(&$data, $key) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
//    print($key . ' ' . $data . '<br>');
}

// Функция для проверки формы add-lot
function check_form(&$data, $key)
{
    global $form_validate;
    $error_class = 'form__item--invalid';
    $error_message = 'Заполните это поле';
    $error_message_email = 'Введите e-mail';
    $error_message_not_email = 'Введите правильный e-mail';
    $error_message_num = 'Заполните это поле числом больше нуля';
    $error_message_bet = 'Минимальная ставка 12000';

    switch ($key) {
        case 'email':
            if (empty($data)) {
                $form_validate[$key] = dataForm($data, $error_class, $error_message_email);
            } elseif (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                    $form_validate[$key] = dataForm($data, $error_class, $error_message_not_email);
                } else {
                    $form_validate[$key] = dataForm($data);
                }
            break;
        case 'category':
            if ($data == 'Выберите категорию') {
                $form_validate[$key] = dataForm($data, $error_class, $error_message);
            } else {
                $form_validate[$key] = dataForm($data);
            }
            break;
        case 'lot-rate':
        case 'lot-step':
            if (!is_numeric($data) || +$data <= 0) {
                $data = '';
                $form_validate[$key] = dataForm($data, $error_class, $error_message_num);
            } else {
                $form_validate[$key] = dataForm($data);
            }
            break;
        case 'cost':
            if (!is_numeric($data) || +$data < 12000) {
                $data = '';
                $form_validate[$key] = dataForm($data, $error_class, $error_message_bet);
            } else {
                $form_validate[$key] = dataForm($data);
            }
            break;
        default:
            if (empty($data)) {
                $form_validate[$key] = dataForm($data, $error_class, $error_message);
            } else {
                $form_validate[$key] = dataForm($data);
            }
    }

//    print($key . ' ' . $form_validate[$key]['value'] . ' /  ' . $form_validate[$key]['error_class'] . ' /  ' . $form_validate[$key]['error_message'] . '<br>');
}

// Функция для заполнения массива $form_valid об ошибках
function dataForm($data = '', $error_class = '', $error_message = '') {
    global $form_valid;
    if ($error_class != '' ) {
        $form_valid = 'form--invalid';
    }
    return [
        'value' => $data,
        'error_class' => $error_class,
        'error_message' => $error_message
    ];
}

// Функция для поиска юзера
function searchUser($email, $users) {
    $result = null;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }

    return $result;
}

// Функция форматирования времени
// $time_input - время в формате временной метки
// 1. Если переданное дата/время старше 24 часов от текущего времени, то вернуть дату/время в формате «дд.мм.гг в чч.мм».
// Например: «19.03.17 в 08:21»
// 2. Если с переданного даты/времени прошло меньше 24 часов, то вернуть дату/время в относительном формате
// по следующим правилам:
// o	если меньше часа, то результат будет в формате «{кол-во минут} минут назад»
// o	если больше часа, то результат «часов».
function time_format($time_input)
{
    $now = time();
    $time_diff = $now - $time_input;
    $hours_end = ['час', 'часа', 'часов'];
    $minutes_end = ['минуту', 'минуты', 'минут'];
    $text_back = ' назад';

    if ( $time_diff > (24 * 60 * 60 )) {
        return gmdate("d.m.Y", $time_diff) . ' в ' . gmdate("H:i", $time_diff);
    } elseif ($time_diff > 60 * 60 ) {
        $time_hour = floor($time_diff / (60 * 60));
        return $time_hour . ' ' . endings($time_hour, $hours_end) . $text_back;
    } else {
        $time_minute = floor($time_diff / 60);
        return $time_minute .  ' ' . endings($time_minute, $minutes_end) . $text_back;
    }
}

// Функция определения склонения
// $num {int} - число
// $variants {Array} ['час', 'часа', 'часов'];
// по принципу 1 'час', 2 'часа', 5 'часов'
// Возвращает необходимое слово огласно массиву $variants
function endings($num, $variants) {
    $num1 = $num % 10;
    $num2 = $num % 100;

    if ($num2 >= 11 && $num2 <= 14) {
        return $variants[2];
    } elseif ($num1 == 1) {
        return $variants[0];
    } elseif ($num1 >= 2 && $num1 <= 4) {
        return $variants[1];
    } else {
        return $variants[2];
    }
}

/**
 * @param $id_lot string lot id
 * @param $bet string  bet for lot with id $id_lot
 * Add new information about bet for lot into cookies
 */
function save_bets($id_lot, $bet) {
    $cookie_name = 'my_bets';
    $my_bets = [];
    if (!empty($_COOKIE[$cookie_name])) {
        $my_bets = json_decode($_COOKIE[$cookie_name], true);
    }
    $my_bets[$id_lot] = [
        'bet' => $bet,
        'time' => time()
    ];
//    $my_bets[] = [
//        'id_lot' => $id_lot,
//        'bet' => $bet,
//        'time' => time()
//    ];
    setcookie($cookie_name, json_encode($my_bets), strtotime('+7 days'), "/");
}

/**
 * @param $id_lot string lot id
 * @return bool true if lot with $id_lot has my bet into cookie
 */
function check_lot($id_lot) {
    $my_bets = json_decode($_COOKIE['my_bets'], true);
    return array_key_exists($id_lot, $my_bets);
}

//function check_lot($id_lot) {
//    $my_bets = json_decode($_COOKIE['my_bets'], true);
//    print ($my_bets);
//    foreach ($my_bets as $my_bet) {
//        if (array_key_exists($my_bet[$id_lot]));
//        return true;
//    }
//}

?>