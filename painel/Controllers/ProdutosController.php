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
    /*
    public function remove (int $id){

        if (!empty($id)) {

            $cat = new Categorias();
            $cat->removeCategoria($id);

            header("Location:".BASE_URL."categorias");
        }
    }

    public function edit (int $id){

        $dados = [];
        $cat = new Categorias();

        if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {

            $cat->editCategoria($_POST['categoria'], $id);

            header("Location:".BASE_URL."categorias");

        }

        $dados['categoria'] = $cat->getCategoria($id);

        $this->loadTemplate('categorias_edit', $dados);
    }
    */
    
}