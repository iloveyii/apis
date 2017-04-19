<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:49
 */
include 'ServiceFunctions.php';

if(isset($_GET['method'])) {

    $services = new ServiceFunctions();

    switch($_GET['method']) {
        case 'countWords':
            $response = $services->countWords($_GET['paragraph']);
            break;

        case 'getDisplayName':
            $response = $services->getDisplayName($_GET['first_name'], $_GET['last_name']);
            break;
    }

} else {
    $response = 'Unknown method: ' . $_GET['method'];
}

echo json_encode($response);
error_log('Called service with params ' . http_build_query($_GET) . date('Y-m-d H:i:s', time()) . PHP_EOL, 3 , './access.log');