<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;

class CarrinhoController extends Controller {

    public function add($id)
    {
        $dados = array();

        if(!empty($id)) {

            $produto = new Produtos();

            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }

            $_SESSION['carrinho'] = $produto->getProdutoById($id);
            

            $dados['produto'] = $$produto->getProdutoById($id);

            $this->loadTemplate('carrinho', $dados);
        }

    }
}