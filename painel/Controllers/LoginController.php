<?php

namespace Controllers;

use \Core\Controller;
use \Models\Admin;

class LoginController extends Controller
{
    public function index()
    {
        $dados = array(
            'erro' => ''
        );

        $admin = new Admin();

        if (isset($_POST['usuario']) && !empty($_POST['senha'])) {

            $usuario = addslashes($_POST['usuario']);
            $senha = md5($_POST['senha']);

            if ($admin->logar($usuario, $senha)) {
                
                $this->loadTemplate('admin_home', $dados);
                exit;

            }else{

                $dados['erro'] = 'Usuário e/ou Senha incorretos';

                $this->loadTemplate("login_admin", $dados);
                exit;
            }

            
        }

        $this->loadTemplate('login_admin', $dados);
    }

    
    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: '.BASE_URL.'login');
    }
}