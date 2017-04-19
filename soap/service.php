<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:49
 */
include 'ServiceFunctions.php';
$options = array('uri' => 'http://hemlet.loc/');
$server = new SoapServer(NULL, $options);
$server->setClass('ServiceFunctions');
$server->handle();
error_log('Called service.' . PHP_EOL, 3 , './access.log');