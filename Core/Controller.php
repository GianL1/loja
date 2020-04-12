<?php

namespace Core;

class Controller {

    public function loadView($viewData = array(), $viewName){
        extract($viewData);
        require "Views/".$viewName.'.php';
    }

    public function loadViewInTemplate($viewData = array(), $viewName){
        extract($viewData);
        require "Views/template.php";
    }

    public function loadTemplate($viewData = array(), $viewName){
        require "Views/template.php";
    }
}