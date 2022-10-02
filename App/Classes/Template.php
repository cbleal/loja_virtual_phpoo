<?php

namespace App\Classes;

class Template
{
    public function loader()
    {
        return new \Twig_Loader_Filesystem(['../App/Views/site', '../App/Views/Admin']);
    }

    public function init()
    {
        return new \Twig_Environment($this->loader(), [
			'debug' => true,
			'cache' => 'false',
			'auto_reload' => true
		]);
    }
}