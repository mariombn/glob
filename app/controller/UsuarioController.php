<?php

class UsuarioController
{
    public function index() {
        try {
            $view = new View('index/index');
            $view->carregar();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function login($arrDataLogin) {
        try {
            $view = new View('index/index');
            $usua_email = $arrDataLogin['usua_email'];
            $usua_senha = $arrDataLogin['usua_senha'];

            $usuario = new Usuario($usua_email);

            if (crypt($usua_senha, $usuario->getUsuaSenha()) == $usuario->getUsuaSenha()) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['status'] = true;
            } else {
                $view->displayError("E-mail ou senha inválidos");
            }

            $view->carregar();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sair()
    {
        try {
            session_destroy();
            //TODO: Precisa resolver problema do redirecionamento
            Funcoes::redirecionar(HOME_PATH);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}