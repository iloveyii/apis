<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:50
 */
if( ! extension_loaded('soap')) {
    die('Soap extension not installed');
}

$options = array(
    'uri' => 'http://localhost:8080',
    'location' => 'http://localhost:8080/service.php',
    'trace' => 1);
$client = new SoapClient(NULL, $options);

header("Content-Type: application/xml");
echo $client->getDisplayName('Joe', 'Bloggs');