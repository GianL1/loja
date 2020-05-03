<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;
use \Models\Pagamentos;

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
        $pagamentos = new Pagamentos();
        $produtos    = new Produtos();

        $dados = array(
            'pagamento' => array(),
            'total' => 0
        );

        if(isset($_SESSION['carrinho'])) {
            $dados['produtos'] = $produtos->getProdutoCarrinho($_SESSION['carrinho']);
        }

        foreach($dados['produtos'] as $prod) {
            $dados['total'] += $prod['preco'];
        }

        $pagamentos = new Pagamentos();
        $dados['pagamento'] = $pagamentos->getFormasPagamento();
        

        $this->loadTemplate('finalizar_compra', $dados);   
    }


}