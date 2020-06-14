<?php

namespace Controllers;

use Core\Controller;
use Models\Produtos;
use Models\Categorias;


class ProdutosController extends Controller {

    public function index(){
        $dados = [];

        $produtos = new Produtos();

        $dados['produtos'] = $produtos->getProdutos();

        $this->loadTemplate('produtos', $dados);
    }

    

    public function add () {
        $dados = [];

        $cat = new Categorias();
        $dados['categorias'] = $cat->getCategorias();
        
        if (isset($_POST['produto']) && !empty($_POST['produto']) 
            && isset($_FILES['imagem']) 
            && !empty($_FILES['imagem']['tmp_name'])) {

            $produto = new Produtos();

            $nome = addslashes($_POST['produto']);
            $descricao = addslashes($_POST['descricao']);
            $categoria = addslashes($_POST['categoria']);
            $preco = addslashes($_POST['preco']);
            $quantidade = addslashes($_POST['quantidade']);
            $imagem = $_FILES['imagem'];

            if (in_array($imagem['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
                $ext = '.jpg';

                if ($imagem['type'] == 'image/png') {
                    $ext = '.png';
                }

                $md5imagens = md5(time().rand(0,9999)).$ext;

                move_uploaded_file($imagem['tmp_name'],'../Assets/images/'.$md5imagens);

                $produto->inserir($nome, $descricao, $categoria, $preco, $quantidade, $md5imagens);

                header("Location: ".BASE_URL.'produtos');
            }
            
        }

        $this->loadTemplate('produtos_add', $dados);

    }
    
    public function remove (int $id){

        if (!empty($id)) {

            $produto = new Produtos();
            $cat->removeProduto($id);

            header("Location:".BASE_URL."produtos");
        }
    }

    public function edit (int $id){

        $dados = array(
            'categorias' => [],
            'produto' => []
        );

        $categoria = new Categorias();
        $produtos = new Produtos();

        $dados['categorias'] = $categoria->getCategorias();
        $dados['produto'] = $produtos->getProduto($id);

        if (isset($_POST['produto']) && !empty($_POST['produto'])) {

            $produto = new Produtos();

            $nome = addslashes($_POST['produto']);
            $descricao = addslashes($_POST['descricao']);
            $categoria = addslashes($_POST['categoria']);
            $preco = addslashes($_POST['preco']);
            $quantidade = addslashes($_POST['quantidade']);
            
            $produto->updateProduto($id, $nome, $descricao, $categoria, $preco, $quantidade);

            
            if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
                $imagem = $_FILES['imagem'];

                if (in_array($imagem['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
                    $ext = '.jpg';

                    if ($imagem['type'] == 'image/png') {
                        $ext = '.png';
                    }

                    $md5imagens = md5(time().rand(0,9999)).$ext;

                    move_uploaded_file($imagem['tmp_name'],'../Assets/images/'.$md5imagens);

                    $produto->updateImagem($id, $md5imagens);

                    header("Location: ".BASE_URL.'produtos');
                }
                
            }

            header("Location: ".BASE_URL.'produtos');
            
            
        }

        $this->loadTemplate('produtos_edit', $dados);
    }
    
    
}