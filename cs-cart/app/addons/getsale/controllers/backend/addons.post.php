<?php

if ( !defined('AREA') ) { die('Access denied');    }

use Tygh\Registry;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'getsale_connect') {
        $getsale = empty($_REQUEST['getsale']) ? array() : $_REQUEST['getsale'];

        Registry::set('getsale.email', $getsale['email']);
        Registry::set('getsale.key', $getsale['apikey']);

        $url = fn_get_storefront_url(fn_get_storefront_protocol());;
        $result = fn_getsale_get_reg($getsale['email'],$getsale['apikey'], $url);
        if (is_object($result)) {
            if (($result->status == 'OK') && (isset($result->payload))) {
                $getsale_id = db_get_row("SELECT * FROM ?:getsale");
                if(empty($getsale_id['project_id'])){
                    db_query("INSERT INTO ?:getsale ?e", array(
                        'project_id'=>$result->payload->projectId,
                        'email'=>$getsale['email'],
                        'key'=>$getsale['apikey'])
                    );
                } else {
                    db_query("UPDATE ?:getsale SET `project_id`=".$result->payload->projectId.", `email`=".$getsale['email'].", `key`=".$getsale['apikey']);
                }
                if(!empty($result->payload->projectId)){
                    fn_set_notification('N', __('getsale'), __('getsale.success'));
                } else fn_set_notification('E', __('getsale'), __('getsale.error_1'));
            } elseif ($result->status = 'error') {
                switch($result->code){
                    case '403':
                        fn_set_notification('E', __('getsale'), __('getsale.error_403'));
                        break;
                    case '404':
                        fn_set_notification('E', __('getsale'), __('getsale.error_404'));
                        break;
                    case '500':
                        fn_set_notification('E', __('getsale'), __('getsale.error_500'));
                        break;
                    default:
                        fn_set_notification('E', __('getsale'), __('getsale.error_0'));
                        break;
                }
            }
        }
        return array(CONTROLLER_STATUS_REDIRECT, 'addons.update?addon=getsale');
    }
} elseif ($mode == 'update') {
    if ($_REQUEST['addon'] == 'getsale') {
        Tygh::$app['view']->assign('getsale_email', fn_getsale_email());
        Tygh::$app['view']->assign('getsale_key', fn_getsale_key());
        Tygh::$app['view']->assign('getsale_id', fn_getsale_id());
    }
}

