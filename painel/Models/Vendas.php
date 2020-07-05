<?php

namespace Models;

use Core\Model;

class Vendas extends Model {

    public function getVendas() {
        $array = [];

        $sql = $this->db->query("SELECT venda.id, 
                                        venda.status_pg AS pg_nome, venda.valor, 
                                        usuarios.nome AS nome_usuario, 
                                        pagamentos.nome FROM venda 
                                        LEFT JOIN usuarios ON usuarios.id = venda.id_usuario 
                                        LEFT JOIN pagamentos ON pagamentos.id = venda.forma_pg");

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getVenda(int $id)
    {
        $array = [];

        $sql = $this->db->prepare("SELECT venda.id, 
                                        venda.status_pg AS pg_nome, venda.valor,
                                        venda.endereco
                                        venda.pg_link 
                                        usuarios.nome AS nome_usuario, 
                                        pagamentos.nome FROM venda 
                                        LEFT JOIN usuarios ON usuarios.id = venda.id_usuario 
                                        LEFT JOIN pagamentos ON pagamentos.id = venda.forma_pg
                                        WHERE id_venda = :id_venda");
        
        $sql->bindValue(":id_venda", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;    
    }

    public function getProdutosVenda(int $id)
    {
        $array = [];

        $sql = $this->db->prepare("SELECT id_produto, quantidade FROM vendas_produtos WHERE id_venda = :id_venda");
        $sql->bindValue(":id_venda", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $produtos = $sql->fetchAll();

            $p = new Produtos;
            foreach($produtos as $prod) {
                $pinfo = $p->getProduto($prod['id_produto']);

                $array[] = array (
                    'id' => $pinfo['id'],
                    'quantidade' => $prod['quantidade'],
                    'nome' => $pinfo['nome'],
                    'imagem' => $pinfo['imagem'],
                    'preco' => $pinfo['preco']
                );
            }
        }
        return $array;
    }
}