<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Produtos;

class ProdutoController extends Controller 
{

    public function ver($id)
    {

        if(!empty($id)) {

            $dados = array();
            $produto = new Produtos();

            $dados['produto'] = $produto->getProdutoById($id);




            $this->loadTemplate("produto", $dados);
        }else {
            header("Location: ".BASE_URL.'notfound');
        }
        
    }
}