<?php

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Controllers\UserController;
use Slim\Psr7\Response;

$app = AppFactory::create();

$app->get('/user/{id}', UserController::class . ':getUserInfo');
$app->get('/users', UserController::class . ':getAllUsers');
$app->post('/user', UserController::class . ':createUser');
$app->put('/user/{id}', UserController::class . ':updateUser');
$app->delete('/user/{id}', UserController::class . ':deleteUser');

// Añadir la ruta para el panel de administración
$app->get('/admin', function ($request, $response, $args) {
    $response->getBody()->write(file_get_contents(__DIR__ . '/../src/views/admin.php'));
    return $response->withHeader('Content-Type', 'text/html');
});

// Endpoint de prueba para verificar la conexión a la base de datos
$app->get('/test-db', function ($request, $response, $args) {
    try {
        $users = \App\Models\User::all();
        $response->getBody()->write('Conexión exitosa. Número de usuarios: ' . $users->count());
    } catch (\Exception $e) {
        $response->getBody()->write('Error de conexión: ' . $e->getMessage());
    }
    return $response;
});

$app->run();
