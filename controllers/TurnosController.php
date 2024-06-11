<?php

namespace Controllers;

use MVC\Router;

class TurnosController{
    public static function turnos(Router $router){
        $tituloPage = 'Carga Turnos';
        $router->render('/turnos',[
            'titulo' => $tituloPage
        ]);
    }
}