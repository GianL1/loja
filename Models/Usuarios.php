<?php

namespace Models;

use \Core\Model;

class Usuarios extends Model {

    public function isExiste($email, $senha = '')
    {
        if(!empty($senha)) {
            $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0) {
                return true;
            }else {
                return false;
            }
        }
        
    }

    public function criar($nome, $email, $senha)
    {
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
        $sql->bindValue(":nome", $nome);      
        $sql->bindValue(":email", $email);   
        $sql->bindValue(":senha", md5($senha));   
        
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function getId($email)
    {
        $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id'];
        
        }

        return $id;
    }
}