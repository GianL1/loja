<?php

namespace Models;

use \Core\Model;

class Vendas extends Model 
{

    public function getPedidosDoUsuario($id_usuario)
    {
        $array = array();
        if (!empty($id_usuario)) {

            $sql = $this->db->prepare("SELECT * FROM venda WHERE id_usuario = :id_usuario");
            $sql->bindValue(":id_usuario",$id_usuario);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }

    public function verificarVendas()
    {
        require "libraries/PagSeguroLibrary/PagSeguroLibrary.php";

        $code = '';
        $type = '';

        if(isset($_POST['notificationCode']) && isset($_POST['notificationType'])){
            $code = trim($_POST['notificationCode']);
            $type = trim($_POST['notificationType']);

            $notificationType = new PagSeguroNotificationType($type);
            $strType = $notificationType->getTypeFromValue();

            $credentials = PagSeguroConfig::getAcountCredentials();

            try {

                $transaction = PagSeguroNotificationService::checkTransaction($credentials, $code);
                $ref = $transaction->getReference();
                $status = $transaction->getStatus()->getValue();

                $novoStatus = 0;

                switch ($status) {
                    case '1': //Aguardando pagamento
                    case '2':
                        $novoStatus = '1';
                        break;
                    case '3': //Paga
                    case '4': //Disponivel
                        $novoStatus = '2';

                        break;
                    case '6': //Devolvida
                    case '7': //Cancelada
                        $novoStatus = '3';

                        break;

                }

                $sql = $this->db->prepare("UPDATE venda SET status_pg = :status_pg WHERE id = :ref");
                $sql->bindValue(":status_pg", $novoStatus);
                $sql->bindValue(":ref", $ref);
                $sql->execute();

            } catch (PagSeguroServiceException $e) {
                echo "FALHA: ". $e->getMessage();
            }

        }
    }
    public function setVenda($id_usuario, $endereco, $subtotal, $pg, $prods)
    {
        /*
         1 => Aguardando Pagamento
         2 => Aprovado
         3 => Cancelado
        */

        $status = 1;
        $pg_link = '';

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
        
        
        if ($pg == '1') {

            $status = '2';

            $pg_link = BASE_URL.'carrinho/obrigado';

            $sql = $this->db->prepare("UPDATE venda SET status_pg = :status_pg WHERE id = :id_venda");
            $sql->bindValue(":id_venda", $id_venda);
            $sql->bindValue(":status_pg", $status);
            $sql->execute();


        } elseif($pg == '2') {
            //Pagseguro
            require "libraries/PagSeguroLibrary/PagSeguroLibrary.php";

            $paymentRequest = new PagSeguroPaymentRequest();

            foreach($prods as $prod) {
                $paymentRequest->addItem($prod['id'], $prod['nome'], 1, $prod['preco']);
            }

            $paymentRequest->setCurrency('BRL');
            $paymentRequest->setReference($id_venda);
            $paymentRequest->setRedirectUrl(BASE_URL.'carrinho/obrigado');
            $paymentRequest->addParameter("notificationURL", BASE_URL.'carrinho/notificacao');

            try {

                $cred = PagSeguroConfig::getAccountCredentials();
                $pg_link = $paymentRequest->register($cred);

            } catch (PagSeguroServiceException $e) {
                
                echo $e->getMessage();
            }
            
        }
          

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