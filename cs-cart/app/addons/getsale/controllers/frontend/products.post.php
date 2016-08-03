<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт GtSale на сайт
 */
if ($mode == 'view') {
    $item_view = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getAale) {
                getSale.event('item-view');
                console.log('item-view');
            });
        })(window, 'getSaleCallbacks')";
    Tygh::$app['view']->assign('getsale_iview', $item_view);
}
