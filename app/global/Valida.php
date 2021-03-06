<?php

/**
 * Class Valida
 * Classe responsavel por toda a validação de dados da Aplicação
 */
class Valida
{
    /**
     * Metodo responsavel por validar e-mail
     * @param String $email
     * @return bool
     */
    public static function email($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
}