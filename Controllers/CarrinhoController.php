<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;
use \Models\Pagamentos;
use \Models\Usuarios;
use \Models\Vendas;

class CarrinhoController extends Controller {

    public function index()
    {
        $dados = array();
        $prods = array();

        $produto = new Produtos();

        if(isset($_SESSION['carrinho'])) {
            $prods = $_SESSION['carrinho'];
        }

        $dados['produtos'] = $produto->getProdutoCarrinho($prods);
        
        $this->loadTemplate('carrinho', $dados);
    }

    public function add($id)
    {

        if(!empty($id)) {

            $produto = new Produtos();

            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }

            $_SESSION['carrinho'][] = $id;

            header("Location:".BASE_URL.'carrinho');
        }

    }

    public function del($id)
    {
        foreach ($_SESSION['carrinho'] as $cchave => $value) {
            if($id == $value) {
                unset($_SESSION['carrinho'][$cchave]);
            }
        }
        
        header("Location:".BASE_URL.'carrinho');
    }

    public function finalizar()
    {

        $dados = array(
            'pagamento' => array(),
            'total' => 0,
            'sessionId' => 0,
            'erro' => '',
            'produtos' => []
        );

        require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
        $prods = [];

        if (isset($_SESSION['carrinho'])) {

            $prods = $_SESSION['carrinho'];

        }

        if(count($prods) > 0) {

            $produtos = new Produtos();
            $dados['produtos'] = $produtos->getProdutoById($prods);

            foreach ($dados['produtos'] as $prod) {

                $dados['total'] += $prod['preco'];

            }
        }

        if (isset($_POST['pg_form']) && !empty($_POST['pg_form'])) {
            # code...
        }else {
            try {
                $credentials = PagSeguroConfig::getAccountCredentials();
                $dados['sessionId'] = PagSeguroSessionService::getSession($credentials); 
            } catch (PagSeguroServiceException $e) {
                die($e->getMessagE());
            }
        }

        $this->loadTemplate('finalizar_compra', $dados);   
    }

    public function obrigado()
    {
        $this->loadTemplate("obrigado", $dados=array());    
    }

    public function notificacao()
    {
        $vendas = new Vendas();
        $vendas->verificarVendas();
    }


}