<?php

namespace Controllers;

use Core\Controller;
use Models\Produtos;
use Models\Admin;

class HomeController extends Controller {

    public function __construct(){

        $admin = new Admin();
        
        if ($admin->isLogged() == false) {
            header("Location: ".BASE_URL.'login');
        }
    }

    public function index(){

        $dados = [];   

        $this->loadTemplate('admin_home', $dados);
    }
}