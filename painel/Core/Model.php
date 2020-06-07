<?php 

namespace Core;
use PDO;

class Model {

    protected $db;

    public function __construct(){
        global $config;

        try {
            $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'],$config['dbuser'], $config['dbpass']);
        } catch (\PDOException $th) {
            echo "ERRO: ".$th->getMessage();
        }
    }
}