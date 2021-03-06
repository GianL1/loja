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

        public function add () {
            $dados = [];

            if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {

                $cat = new Categorias;
                $cat->addCategoria($_POST['categoria']);

                header("Location:".BASE_URL."categorias");

            }

            $this->loadTemplate('categorias_add', $dados);

        }

        public function remove (int $id){

            if (!empty($id)) {

                $cat = new Categorias();
                $cat->removeCategoria($id);

                header("Location:".BASE_URL."categorias");
            }
        }

        public function edit (int $id){

            $dados = [];
            $cat = new Categorias();

            if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {

                $cat->editCategoria($_POST['categoria'], $id);

                header("Location:".BASE_URL."categorias");

            }

            $dados['categoria'] = $cat->getCategoria($id);

            $this->loadTemplate('categorias_edit', $dados);
        }

    }