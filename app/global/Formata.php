<?php

/**
 * Class Formata
 */
class Formata
{
    /**
     * Metodo responsavel por validar e-mail
     * @param String $email
     * @return bool
     */
    public static function email($email)
    {
        return true; //TODO: Imprementar código
    }

    /**
     * Metodo responsavel por validar URL
     * @param String $url
     * @return bool
     */
    public static function url($url)
    {
        return true; //TODO: Imprementar código
    }

    /**
     * Metodo responsavel por validar Data
     * @param String $data
     * @param String $formato
     * @return bool
     */
    public static function data($data, $formato)
    {
        return true; //TODO: Imprementar código
    }

    /**
     * Metodo respostavel por criptografar em hash a senha
     * @param $senha
     * @return string
     */
    public static function senha($senha)
    {
        return crypt($senha, '$2a$07$eisaqu/vidahuniversotudomais.');
    }
}