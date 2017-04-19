<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 18:37
 */
require_once('./api.php');
require_once('./myapi.php');

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}
try {
    $api = new MyApi($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $api->processRequest();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}