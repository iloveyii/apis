<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 11:37
 */

class ServiceFunctions
{
    public function getDisplayName($first_name, $last_name) {
        $name = '';
        $name .= strtoupper(substr($first_name, 0, 1));
        $name .= ' ' . ucfirst($last_name);
        return $name;
    }

    public function countWords($paragraph) {
        $words = preg_split('/[. ,!?;]+/',$paragraph);
        return count($words);
    }
}