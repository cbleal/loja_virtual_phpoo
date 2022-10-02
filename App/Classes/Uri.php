<?php

namespace App\Classes;

class Uri
{
    private $uri;

    public function __construct() {
        // atribui a URI padrão da URL
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    // se a URI estiver vazia (padrão /) retorna true, senão false
    public function emptyUri()
    {
        return ($this->uri == '/') ? true : false;
    }

    // retornar a URI
    public function getUri()
    {
        return $this->uri;
    }
}