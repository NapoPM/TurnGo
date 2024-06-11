<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\InicioController;
use Controllers\Auth\LoginEmpresaController;
use Controllers\ServiciosController;
use Controllers\SimuladorController;
use Controllers\TurnosController;
use MVC\Router;

$router = new Router();

// Inicio Página
$router->get('/', [InicioController::class, 'inicio']);

// Iniciar Sesión
$router->get('/login', [LoginEmpresaController::class, 'login']);
$router->post('/login', [LoginEmpresaController::class, 'login']);

// Cerrar Sesión
$router->get('/logout', [LoginEmpresaController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginEmpresaController::class, 'olvide']);
$router->post('/olvide', [LoginEmpresaController::class, 'olvide']);
$router->get('/recuperar', [LoginEmpresaController::class, 'recuperar']);
$router->post('/recuperar', [LoginEmpresaController::class, 'recuperar']);


// Crear Cuenta
$router->get('/crear-cuenta', [LoginEmpresaController::class, 'crear']);
$router->post('/crear-cuenta', [LoginEmpresaController::class, 'crear']);

// Confirmar Cuenta
$router->get('/confirmar-cuenta', [LoginEmpresaController::class, 'confirmar']);
$router->get('/mensaje', [LoginEmpresaController::class, 'mensaje']);

// Cargar Turnos

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();