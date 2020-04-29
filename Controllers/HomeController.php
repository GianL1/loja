<?php

namespace Controllers;

use Core\Controller;
use Models\Categorias;
use Models\Produtos;


class HomeController extends Controller {

    public function index()
    {
        $dados = array();
        $categorias = new Categorias();
        $produtos = new Produtos();

        $dados['categorias'] = $categorias->getCategorias();
        $dados['produtos'] = $produtos->listarProdutos();

        

        $this->loadTemplate('home', $dados);
    }
}