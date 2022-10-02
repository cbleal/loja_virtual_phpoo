<?php

use App\Classes\Template;
use App\Controllers\Controller;
use App\Controllers\Method;

$template = new Template;
$twig = $template->init();
dump($twig);

/**
 * chamando o controller digitando na url:
 * http://localhost:8000/produto
 */
$callController = new Controller;
$calledController = $callController->controller();  // ProdutoController
$controller = new $calledController();  // ProdutoController()

/**
 * chamando o method digitando na url:
 * http://localhost:8000/produto/salvar
 */
$callMethod = new Method;
$method = $callMethod->method($controller);  // Salvar()

/**
 * Chamando o controller através da classe controller e method
 */
$controller->$method();  // ProdutoController->Salvar()
