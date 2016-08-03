<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

fn_register_hooks(
    'delete_cart_product'
);