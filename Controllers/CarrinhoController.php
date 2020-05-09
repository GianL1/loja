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
        $pagamentos  = new Pagamentos();
        $produtos    = new Produtos();
        $usuarios = new Usuarios();
        $vendas = new Vendas();

        $dados = array(
            'pagamento' => array(),
            'total' => 0,
            'erro' => ''
        );

        if(count($_SESSION['carrinho'])) {
            $dados['produtos'] = $produtos->getProdutoCarrinho($_SESSION['carrinho']);
        }

        foreach($dados['produtos'] as $prod) {
            $dados['total'] += $prod['preco'];
        }

        $dados['pagamento'] = $pagamentos->getFormasPagamento();

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $endereco = addslashes($_POST['endereco']);
            
            
            if(isset($_POST['pg'])) {
                $pg = addslashes($_POST['pg']);
            }else {
                $pg = '';
            }

            if(!empty($email) && !empty($senha) && !empty($endereco)) {

                $uid = 0;

                if($usuarios->isExiste($email)) {
                    if($usuarios->isExiste($email, $senha)) {
                        $uid = $usuarios->getId($email);
                    }else {
                        $dados['erro'] = 'Usuario e/ou senha incorretos';
                    }
                }else {
                    $uid = $usuarios->criar($nome, $email, $senha);

                    if ($uid > 0) {

                        $subtotal = 0;

                        if(count($_SESSION['carrinho'])) {
                            $prods = $produtos->getProdutoCarrinho($_SESSION['carrinho']);
                        }
                
                        foreach($dados['produtos'] as $prod) {
                            $subtotal += $prod['preco'];
                        }
                    }

                    $link = $vendas->setVenda($id_usuario, $endereco, $subtotal, $pg, $prods);

                    header("Location: ".$link);
                }

            }else {
                $dados['erro'] = 'Preencha todos os campos';
            }

            
        }
        

        $this->loadTemplate('finalizar_compra', $dados);   
    }

    public function obrigado()
    {
        $this->loadTemplate("obrigado", $dados=array());    
    }


}