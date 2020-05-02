<?php

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;
use \Models\Categorias;

class CategoriaController extends Controller 
{

    public function ver($id)
    {
        if(!empty($id)) {
            $dados = array();
            $produtos = new Produtos();
            $categorias = new Categorias();

            $dados['categoria_nome'] = $categorias->getNomeCategoria($id);
            
            $dados['produtos'] = $produtos->getProdutosByIdCategoria($id);

            $this->loadTemplate('categoria',$dados);

        } else{
            echo "ID DE CATEGORIA NÃO EXISTENTE";
        }
        
    }
}