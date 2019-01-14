<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:49
 */
include 'ServiceFunctions.php';
include '../conf.php';

$options = array('uri' => SERVER_URL . '/soap/');
$server = new SoapServer(NULL, $options);
$server->setClass('ServiceFunctions');
$server->handle();
error_log('Called service. ' . date('Y-m-d H:i:s', time()) . PHP_EOL, 3 , './access.log');