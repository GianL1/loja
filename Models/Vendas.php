<?php

namespace Models;

use \Core\Model;

class Vendas extends Model 
{
    public function setVenda($id_usuario, $endereco, $subtotal, $pg, $prods)
    {
        /*
         1 => Aguardando Pagamento
         2 => Aprovado
         3 => Cancelado
        */

        $status = 1;
        $pg_link = '';
        
        if ($pg == '1') {
            $status = '2';

            $pg_link = BASE_URL.'carrinho/obrigado';
        } else {
            //integração com pagamentos
        }
        $sql = $this->db->prepare("INSERT INTO venda SET id_usuario = :id_usuario, endereco = :endereco, 
                                    valor = :valor, forma_pg = :forma_pg, status_pg = :status_pg, pg_link = :pg_link");

        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":endereco", $endereco);
        $sql->bindValue(":valor", $subtotal);
        $sql->bindValue(":forma_pg", $pg);
        $sql->bindValue(":status_pg", $status);
        $sql->bindValue(":pg_link", $pg_link);

        $sql->execute();
        

        $id_venda = $this->db->lastInsertId();

        foreach($prods as $prod) {
            $sql = $this->db->prepare("INSERT INTO vendas_produtos SET id_venda = :id_venda, id_produto = :id_produto, quantidade = 1 ");
            $sql->bindValue(":id_venda", $id_venda);
            $sql->bindValue(":id_produto", $prod['id']);

            $sql->execute();
        }

        unset($_SESSION['carrinho']);

        return $pg_link;

                                    
    }
}