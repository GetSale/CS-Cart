<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'add') {
    setcookie('GETSALE_REG', 'Y', '', '/');
}
