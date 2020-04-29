<?php

namespace Models;

use \Core\Model;

class Categorias extends Model
{
    public function getCategorias(){
        $array = array();

        $sql = $this->db->query("SELECT * FROM categorias");
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getNomeCategoria($id)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT titulo FROM categorias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();    
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            
            $array = $sql['titulo'];
        }
        return $array;
    }
}