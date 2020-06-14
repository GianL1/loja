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

    public function getProduto(int $id){
        
        $array = [];

        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
        
    }

    public function updateProduto ($id, $nome, $descricao, $categoria, $preco, $quantidade) {
        $sql = $this->db->prepare("UPDATE produtos SET nome = :nome
                                                          , descricao = :descricao
                                                          , id_categoria = :id_categoria
                                                          , preco = :preco
                                                          , quantidade = :quantidade
                                                            WHERE id = :id");

        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":id", $id);

        $sql->execute();
    }

    public function updateImagem(int $id, mixed $imagem){
        $sql = $this->db->prepare("UPDATE produtos SET imagem = imagem WHERE id = :id");

        $sql->bindValue(":id", $id);
        $sql->bindValue(":imagem", $imagem);
        $sql->execute();
    }

    public function removeProduto(int $id){


        $sql = $this->db->prepare("DELETE FROM produtos WHERE id_categoria = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
    }
}