<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;

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
}