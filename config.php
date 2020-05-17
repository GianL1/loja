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
    $config['tipos_pgto'] = array(
        '1' => 'Aguardando Pagamento',
        '2' => 'Aprovado',
        '3' => 'Cancelado';
    )
?>