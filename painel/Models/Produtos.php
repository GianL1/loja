<?php

namespace Models;

use Core\Model;

class Produtos extends Model
{
    public function getProdutos(){
        $array = [];

        $sql = $this->db->query("SELECT *,
                                (select categorias.titulo from categorias where categorias.id = produtos.id_categoria) as categoria 
                                FROM produtos");

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}