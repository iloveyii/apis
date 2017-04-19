<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 2017-04-19
 * Time: 18:02
 */
$arrayCountWords = [
    'method'=>'countWords',
    'paragraph'=>'How many words are here !!! Can you guess ??? '
];

$arrayGetDisplayName = [
    'method' => 'getDisplayName',
    'first_name'=> 'John',
    'last_name' => 'Doe'
];

$url = 'http://hemlet.loc/rpc/service.php';

$requestUrl = sprintf("%s?%s", $url, http_build_query($arrayCountWords));
$countWords = file_get_contents($requestUrl);
echo $countWords;
echo '<br />';

$requestUrl = sprintf("%s?%s", $url, http_build_query($arrayGetDisplayName));
$displayName = file_get_contents($requestUrl);
echo $displayName;