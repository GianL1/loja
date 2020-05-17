<?php

namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class LoginController extends Controller
{
    public function index()
    {
        $dados = array(
            'erro' => ''
        );

        $usuarios = new Usuarios();

        if (isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])) {

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if ($usuarios->isExiste($email, $senha)) {

                $_SESSION['cliente'] = $usuarios->getId($email);

                header('Location:'.BASE_URL.'pedidos');
            }else {

                $dados['erro'] = 'Usuário e/ou senha incorretos !';
                header('Location:'.BASE_URL.'login');
            }

            $this->loadTemplate('pedidos', $dados);
        }

        $this->loadTemplate('login', $dados);
    }

    public function logar()
    {
        $dados = array();


        if (isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])) {
            header("Location:".BASE_URL);
            exit();
        }

        if (isset($_POST['email']) && !empty($_POST['senha'])) {
            $usuarios = new Usuarios();

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if ($usuarios->isExiste($email, $senha)) {

                $_SESSION['cliente'] = $usuarios->getId($email);

                header("Location: ".BASE_URL);
            } else {

                $dados['erro'] = 'Usuário e/ou senha incorretos';

                header('Location: '.BASE_URL.'login');
            }
        }

        $this->loadTemplate('login');
    }
    public function logout()
    {
        unset($_SESSION['cliente']);
        header('Location: '.BASE_URL.'login');
    }
}