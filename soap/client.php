<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:50
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

if( ! extension_loaded('soap') || ! class_exists("SOAPClient")) {
    die('Soap extension not installed');
}

$options = array(
    'uri' => 'MyNamespace',
    'location' => 'http://api.loc/soap/service.php',
    'trace' => 1);
$client = new SoapClient(NULL, $options);

echo $client->getDisplayName('Joe', 'Bloggs');
echo '<br />';
echo $client->countWords('How many words are here !!! Can you guess ??? ');