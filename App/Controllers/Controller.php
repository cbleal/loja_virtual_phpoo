<?php

namespace App\Controllers;

use App\Classes\Uri;

class Controller
{
    // constantes
    const NAMESPACE_CONTROLLER = '\App\Controllers';
    const FOLDERS_CONTROLLER = ['Site', 'Admin'];
    const ERROR_CONTROLLER = '\App\Controllers\Erro\ErroController';

    // atributos
    private $uri;

    /**
     * Construtor da classe.
     * Instancia um objeto do tipo Uri.
     * Ex: meusite.com.br/contato/inserir -> URI: /contato/inserir
     */
    public function __construct() {
        $this->uri = new Uri;
    }

    /**
     * Função que pega a primeira parte da URL entre a primeira e a 
     * segunda / que considera como controller colocando a primeira letra em 
     * maiúsculo seguida da palavra Controller.
     * Ex: meusite.com.br/produto -> controller: ProdutoController
     */
    private function getController()
    {
        if (!$this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));
            return ucfirst($explodeUri[1]) . 'Controller';
        }
        return ucfirst(DEFAULT_CONTROLLER) . 'Controller';
    }

    /**
     * Função que vai percorrer o caminho do controller e retorná-lo caso
     * exista, senão, retorna o controller padrão index
     */
    public function controller()
    {
        // pegar o controller
        $controller = $this->getController();

        // percorrer as pastas para encontrar o controller
        foreach (self::FOLDERS_CONTROLLER as $folderController) {            
            // verificar se existe o controller nas pastas dentro de App/Controller          
            if (class_exists(self::NAMESPACE_CONTROLLER . '\\' . $folderController . '\\' . $controller)) {
                // retorna o controller e todo o seu caminho
                return self::NAMESPACE_CONTROLLER . '\\' . $folderController . '\\' . $controller;
            }
        }
        // se não encontrou o controller, retorna um erro.
        return self::ERROR_CONTROLLER;

    }
}