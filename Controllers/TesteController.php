<?php

namespace Controllers;

use Core\Controller;

class TesteController extends Controller 
{
    public function foi($nome, $sobrenome){
        echo "Foi mesmo: ".$nome.' '.$sobrenome;
    }
}