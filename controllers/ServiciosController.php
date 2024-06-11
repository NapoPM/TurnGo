<?php

namespace Controllers;

use MVC\Router;

class ServiciosController{
    public static function servicios(Router $router){
        $tituloPage = 'Carga Servicios';
        $router->render('/servicios',[
            'titulo' => $tituloPage
        ]);
    }
}