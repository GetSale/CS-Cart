<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

if ($mode == 'view') {
    $cat_view = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('cat-view');
                console.log('cat-view');
            });
        })(window, 'getSaleCallbacks');";
    Tygh::$app['view']->assign('getsale_cview', $cat_view);
}