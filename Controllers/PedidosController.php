<?php 

namespace Controllers;

use \Core\Controller;
use Models\Produtos;
use Models\Vendas;


class PedidosController extends Controller
{
    public function index()
    {
        $dados = array();

        if (isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])) {
            $dados['pedidos'] = array();

            $vendas = new Vendas();

            $dados['pedidos'] = $vendas->getPedidosDoUsuario($_SESSION['cliente']);

            $this->loadTemplate('pedidos',$dados);

        } else {
            header('Location:'.BASE_URL.'login');
        }

    }

    public function ver($id)
    {
        $vendas = new Vendas();

        if (!empty($id)) {
            $id = addslashes($id);
            $dados = array();

            if(!empty($dados['pedidos'] = $vendas->getPedido($id, $_SESSION['cliente']))) {

                
                $this->loadTemplate('pedidos_ver', $dados);

            }


        }else{
            header('Location:'.BASE_URL);
        }
    }


}