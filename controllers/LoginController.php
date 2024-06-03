<?php

namespace Controllers;

use Classes\Email;
use Model\UsuarioEmpresa;
use MVC\Router;

use function PHPSTORM_META\map;

class LoginController{

    public static function login(Router $router){
        $router->render('auth/login',[
            'titulo' => 'Iniciar Sesión en Turngo'
        ]);
    }

    public static function logout(){
        echo "Hola Logout";
    }

    public static function olvide(){
        echo "Hola Olvide";
    }

    public static function recuperar(){
        echo "Hola Recuperar";
    }

    public static function crear(Router $router){
        $usuario = new UsuarioEmpresa;
        // alertas Vacias
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alertas este vacio
            if (empty($alertas)) {
               $resultado = $usuario->existeUsuario();

               if ($resultado->num_rows) {
                    $alertas = UsuarioEmpresa::getAlertas();
               } else{
                    // Hashear pass
                    $usuario->hashPassWord();

                    // Crear un Token único
                    $usuario->crearToken();

                    // Enviar email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el Usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }

               }
            }
        }

        // debuguear($alertas);
    
        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){
        $alertas = [];

        $token = s($_GET['token']);

        $usuario = UsuarioEmpresa::where('token', $token);

        if (empty($usuario)) {
            UsuarioEmpresa::setAlerta('error', 'Token No Válido');
        }else{
            $usuario->confirmado = "1";
            $usuario->token = "";
            /*Faltaría agregar $usuario->tipoUsuario = "numero que sea UsuarioEmpresa"*/
            $usuario->guardar();
            UsuarioEmpresa::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }
        $alertas = UsuarioEmpresa::getAlertas();
        $router->render('auth/confirmar-cuenta',[
            'alertas' => $alertas
        ]);
    }
}