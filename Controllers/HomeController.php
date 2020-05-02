<?php

namespace Controllers;

use Core\Controller;
use Models\Produtos;


class HomeController extends Controller {


    public function index()
    {
        $produtos = new Produtos();

        $dados['produtos'] = $produtos->listarProdutos();

        $this->loadTemplate('home', $dados);
    }
}