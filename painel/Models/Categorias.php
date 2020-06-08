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

    public function addCategoria(string $titulo){

        if (!empty($titulo)) {

            $titulo = addslashes($titulo);

            $sql = $this->db->prepare("INSERT INTO categorias SET titulo = :titulo");
            $sql->bindValue(":titulo", $titulo);
            $sql->execute();

        }
        

    }

    public function removeCategoria(int $id){

        $id = addslashes($id);
        $sql = $this->db->prepare("DELETE FROM categorias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = $this->db->prepare("DELETE FROM produtos WHERE id_id_categoria = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
    }

    public function editCategoria(int $id, string $titulo){

        if (!empty($titulo) && !empty($id)) {

            $titulo = addslashes($titulo);
            $id = addslashes($id);

            $sql = $this->db->prepare("UPDATE FROM categorias SET titulo = :titulo WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":titulo", $titulo);
            $sql->execute();

        }
    }

    public function getCategoria(int $id){
        $array = [];

        $id = addslashes($id);

        $sql = $this->db->prepare("SELECT * FROM categorias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();


        if($sql->rowCount() > 0) {

            $array  = $sql->fetch();

        }

        return $array;
    }
}