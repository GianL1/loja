<?php

namespace Models;

use Core\Model;

class Categorias extends Model
{
    public function getCategorias(){
        $array = [];

        $sql = $this->db->query("SELECT * FROM categorias");

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
}