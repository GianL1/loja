<?php

namespace Models;

use \Core\Model;

class Produtos extends Model
{
    public function listarProdutos($qt = 0)
    {
        $array = array();

        $sql = "SELECT * FROM produtos ORDER BY RAND() ";

        if($qt > 0) {
            $sql .= "LIMIT ".$qt;
        }

        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getProdutosByIdCategoria($id_categoria)
    {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id_categoria =  :id_categoria");
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getProdutoById($id)
    {
        $array = array();
        $id = addslashes($id);
        
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array = $sql->fetch();
            
        }

        return $array;
    }

    public function getProdutoCarrinho($id)
    {
        $array = array();

        $sql = $this->db->query("SELECT * FROM produtos WHERE id IN(".implode(',', $id).")");

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}