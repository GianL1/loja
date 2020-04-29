<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Categorias;
use \Models\Produtos;

class ProdutoController extends Controller {

    public function ver($id){

        if(!empty($id)) {

            $dados = array();
            $categorias = new Categorias();
            $produto = new Produtos();

            $dados['categorias'] = $categorias->getCategorias();
            $dados['produto'] = $produto->getProdutoById($id);




            $this->loadTemplate("produto", $dados);
        }else {
            header("Location: ".BASE_URL.'notfound');
        }
        
    }
}