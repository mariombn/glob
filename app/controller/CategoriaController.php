<?php

class CategoriaController
{
    public function index()
    {
        try {
            $view = new View('categoria/lista');

            $listaCategorias = Categoria::listar();
            $view->__set('lista', $listaCategorias);
            //Debug::dump($listaCategorias);
            $view->carregar();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function cadastrar()
    {
        try {
            $view = new View('categoria/cadastrar');
            $view->carregar();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function add($formsubmit)
    {
        try {

            $cate_nome = $formsubmit['cate_nome'];
            $cate_descricao = $formsubmit['cate_descricao'];
            $cate_status = $formsubmit['cate_status'];

            $categoria = new Categoria();
            $categoria->setCateNome($cate_nome);
            $categoria->setCateDescricao($cate_descricao);
            $categoria->setCateStatus($cate_status);
            $validacao = $categoria->validaEntidade();
            if (!is_array($validacao)) {

            } else {
                $view = new View('categoria/cadastrar');
                $view->displayError($validacao);
            }
            $view->carregar();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}