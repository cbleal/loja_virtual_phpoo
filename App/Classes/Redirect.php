<?php
 
 namespace App\Classes;

 class Redirect
 {
     // redireciona para a rota informada ou é redirecionado para padrão /
     public function FunctionName($redirect = null)
     {
         if (is_null($redirect)) {
             return header("Location:/");
         }
         return header("Location:$redirect");
     }
 }