<?php

namespace Models;

use \Core\Model;

class Pagamentos extends Model {

    public function getFormasPagamento()
    {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM pagamentos");

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}