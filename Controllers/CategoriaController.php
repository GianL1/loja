<?php

namespace Controllers;

use \Core\Controller;
use \Models\Categorias;
use \Models\Produtos;

class CategoriaController extends Controller 
{
    public function ver($id)
    {
        if(!empty($id)) {
            $dados = array();
            $categorias = new Categorias();
            $produtos = new Produtos();

            $dados['categorias'] = $categorias->getCategorias();
            $dados['categoria_nome'] = $categorias->getNomeCategoria($id);
            
            $dados['produtos'] = $produtos->getProdutosByIdCategoria($id);

            $this->loadTemplate('categoria',$dados);

        } else{
            echo "ID DE CATEGORIA NÃO EXISTENTE";
        }
        
    }
}