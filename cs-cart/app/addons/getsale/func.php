<?php
/**
 * Plugin Name: GetGale
 * Plugin URI:  https://getsale.io/
 * Description: GetSale &mdash; профессиональный инструмент для создания popup-окон.
 * Version:     1.0.0
 * Author:      GetSale Team
 * Author URI:  https://getsale.io/
 * License:     GPL3
 */
if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;
use Tygh\Http;
use Tygh\Mailer;

function fn_getsale_decs() {
    return __('getsale.getsale_desc');
}

function fn_getsale_delete_cart_product(&$cart, $cart_id, $full_erase) {
    if ($full_erase) {
        setcookie('GETSALE_DELETE', 'Y');
    }
}

function fn_getsale_get_reg($email, $key, $url) {
    if (($email == '') OR ($key == '') OR ($url == '')) {
        return false;
    }
    $ch = curl_init();
    $jsondata = json_encode(array('email' => $email, 'key' => $key, 'url' => $url, 'cms' => 'cscart'));
    $options = array(CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Accept: application/json'), CURLOPT_URL => "https://getsale.io/" . "/api/registration.json", CURLOPT_POST => 1, CURLOPT_POSTFIELDS => $jsondata, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $options);
    $json_result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $json_result;
}

function fn_getsale_id() {
    $getsale_id = db_get_row("SELECT * FROM ?:getsale");
    return !empty($getsale_id) ? intval($getsale_id['project_id']) : '';
}

function fn_getsale_email() {
    $getsale_id = db_get_row("SELECT * FROM ?:getsale");
    return !empty($getsale_id) ? ($getsale_id['email']) : '';
}

function fn_getsale_key() {
    $getsale_id = db_get_row("SELECT * FROM ?:getsale");
    return !empty($getsale_id) ? ($getsale_id['key']) : '';
}

function fn_getsale_script($id) {
    return '
    (function(d, w, c) {
      w[c] = {
        projectId: ' . $id . '
      };
      var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src = "//rt.getsale.io/loader.js";
      if (w.opera == "[object Opera]") {
          d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }

    })(document, window, "getSaleInit");';
}
