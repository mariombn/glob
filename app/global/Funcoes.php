<?php

class Funcoes
{
    public static function redirecionar($url)
    {
        header('Localização: ' . $url);
    }
}