<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Categorias;

    class CategoriasController extends Controller 
    {
        public function index(){
            $dados = [];

            $categorias = new Categorias();

            $dados['categorias'] = $categorias->getCategorias();

            $this->loadTemplate('categorias', $dados);
        }

        public function remove($id){
            
        }

        public function edit($id){
            
        }
    }