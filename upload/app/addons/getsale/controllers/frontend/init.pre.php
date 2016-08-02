<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт GetSale на сайт
 */

$id = fn_getsale_id();
if (!empty($id)) {
    $getsale_code = fn_getsale_script($id);
    Tygh::$app['view']->assign('getsale', $getsale_code);
}