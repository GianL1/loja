<?php 

namespace Controllers;

use \Core\Controller;
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


}