<?php 

namespace Controllers;

use Core\Controller;
use Models\Vendas;

class VendasController extends Controller
{
    public function index(){
        $dados = [];

        $vendas = new Vendas();
        $dados['vendas'] = $vendas->getVendas();
        
        $this->loadTemplate("vendas", $dados);
    }
}