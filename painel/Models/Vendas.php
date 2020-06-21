<?php

namespace Models;

use Core\Model;

class Vendas extends Model {

    public function getVendas() {
        $array = [];

        $sql = $this->db->query("SELECT vendas.id, 
                                        vendas.status_pg AS pg_nome, 
                                        vendas.valor, 
                                        usuarios.nome AS nome_usuario, 
                                        pagamentos.nome 
                                FROM vendas
                                LEFT JOIN usuarios ON usuarios.id = vendas.id_usuario
                                LEFT JOIN pagamentos ON pagamentos.id = vendas.forma_pg");

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}