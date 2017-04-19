<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 18:33
 */

require_once('./api.php');

class MyApi extends Api
{
    public function __construct($request, $origin) {
        parent::__construct($request);
    }

    /**
     * Example of an Endpoint
     */
    protected function example() {
        if ($this->method == 'GET') {
            return "Your verb is " . $this->verb;
        } else {
            return "Only accepts GET requests";
        }
    }
}