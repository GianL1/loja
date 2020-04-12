<?php

require "environment.php";

$config = array();
global $config;

if(ENVIRONMENT == "development") {
    define("BASE_URL", "http://localhost/php/loja/");

    $config['dbname'] = 'loja';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    $config['dbname'] = 'loja';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}