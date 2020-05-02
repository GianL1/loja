<?php

namespace Core;
use \Models\Categorias;

class Controller {
    public function __construct(){

        $categorias = new Categorias();
        $dados['categorias'] = $categorias->getCategorias();

        extract($dados);
        $this->loadView('includes/menu', $dados);
    }

    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        include "Views/".$viewName.'.php';
    }

    public function loadViewInTemplate ($viewName, $viewData = array()){
        extract($viewData);
        require "Views/".$viewName.'.php';
    }

    public function loadTemplate ($viewName, $viewData = array()){
        require "Views/template.php";
    }

    

}