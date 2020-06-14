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

    public function inserir($nome, $descricao, $categoria, $preco,  $quantidade, $imagem){
        
        $sql = $this->db->prepare("INSERT INTO produtos SET nome = :nome
                                                          , descricao = :descricao
                                                          , id_categoria = :id_categoria
                                                          , preco = :preco
                                                          , quantidade = :quantidade
                                                          , imagem = :imagem ");

        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":imagem", $imagem);

        $sql->execute();
    }
}