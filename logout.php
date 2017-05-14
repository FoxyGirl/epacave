<?php
/**
 * Created by PhpStorm.
 * User: FoxyGirl
 * Date: 13.05.2017
 * Time: 23:26
 */

session_start();

unset($_SESSION['user']);
header("Location: /");

?>