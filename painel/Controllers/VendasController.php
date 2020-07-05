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

    public function ver (int $id)
    {
        $dados = [];

        $vendas = new Vendas();
        $dados['venda'] = $vendas->getVenda($id);
        $dados['produtos'] = $vendas->getProdutosVenda($id);

        $this->loadTemplate("vendas_ver", $dados);
    }
}