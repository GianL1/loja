<?php

    namespace Models;
    use Core\Model;
    
    class Admin extends Model
    {
        public function isLogged(){
            
            if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                return true;
            }else {
                return false;
            }
        }

        public function logar($usuario, $senha){
            $sql = $this->db->prepare("SELECT * FROM admin WHERE usuario = :usuario AND senha = :senha");
            $sql->bindValue(":usuario", $usuario);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if($sql->rowCount() > 0 ) {
                $sql = $sql->fetch();

                $_SESSION['admin'] = $sql['id'];

                return true;
                
            }else {
                return false;
            }
        }
    }
    