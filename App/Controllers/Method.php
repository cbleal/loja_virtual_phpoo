<?php

namespace App\Controllers;

use App\Classes\Uri;

class Method
{
    private $uri;

    public function __construct() {
        $this->uri = new Uri;
    }

    private function getMethod()
    {
        $explodeUri = array_filter(explode('/', $this->uri->getUri()));
        if (!$this->uri->emptyUri()) {
            // return (isset($explodeUri[2])) ? $explodeUri[2] : DEFAULT_METHOD;
            return (!isset($explodeUri[2])) ?: $explodeUri[2];
        }
    }

    public function method($object)
    {
        if (method_exists($object, $this->getMethod())) {
            return $this->getMethod();
        }
        return DEFAULT_METHOD;
    }
}