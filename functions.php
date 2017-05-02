<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 26.04.2017
 * Time: 16:24
 */

// Функция включения шаблонов
// $templ {string} путь к файлу шаблона
// $datas {Array} - массив данных, предназначенных для использования в шаблоне
function includeTemplate($templ, $datas = []) {
    if (!file_exists($templ)) {
        return "";
    } else {
        if (!empty($datas)) {
            array_walk_recursive($datas, 'protect');
            extract($datas);        //импортируются переменные из массива
        }
        ob_start();                 //включается буферизация
        include $templ;             //подключается шаблон
        return ob_get_clean();      //возарщается заполненный шаблон и очищается буфер
    }
}

// Функция для защиты XSS
// $data {Array} - массив данных, предназначенных для очистки
function protect(&$data) {
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
}

/*Функция  protectXSS() проверяет, является ли аргумент строкой. Если яволяется, то пропускает эту строку через функцию
  strip_tags(), которая заменяет символы тегов на мнимоники(спецсимволы). Если аргумент является массивом, то
  через рекурсию доходит до уровня строки и тогда для изменения строки использует фунцию strip_tags().*/
function protectXSS($data)
{
    if (is_array($data)) {
        foreach ($data as &$value) {
            $value = protectXSS($value);
        }
        return $data;
    } else {
        return strip_tags($data);
    }

    unset($value);

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

?>