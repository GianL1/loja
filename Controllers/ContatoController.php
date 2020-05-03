<?php 

namespace Controllers;

use \Core\Controller;

class ContatoController extends Controller 
{

    public function index()
    {
        $dados = array();

        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $mensagem = addslashes($_POST['mensagem']);

            $html = "NOME: ".$nome."<br> Email: ".$email."<br>Mensagem: ".$mensagem;
            $headers = 'From: gian.lima@protonmail.com'."\r\n";
            $headers .= 'Reply-To: '.$email."\r\n";
            $headers .= 'X-Mailer: PHP/'.phpversion();

            mail($email, 'Contato pelo site em: '.date('d/m/Y'), $html, $headers);

            $dados['flash_message'] = 'Email Enviado com sucesso';
        }

        $this->loadTemplate('contato', $dados);
    }
}