<?php
/**
 * User: TOLK  Date: 07.04.19
 */

//В рамках задачи не стал использовать бутстрап файл
ini_set('display_errors', 1);

require_once './app/zcore/functions.php';
require_once './app/zcore/Controller.php';
require_once './app/route.php';

session_start();

Route::run();