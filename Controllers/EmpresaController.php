<?php

namespace Controllers;

use \Core\Controller;

class EmpresaController extends Controller 
{
    public function index()
    {
        $dados = array();

        $this->loadTemplate('empresa',$dados);    
    }
}