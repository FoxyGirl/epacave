<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 26.04.2017
 * Time: 16:24
 */

function includeTemplate($templ, $datas = []) {
    if (!file_exists($templ)) {
        return "Беда!!";
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

?>