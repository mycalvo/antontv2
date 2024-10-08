<?php

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Controllers\UserController;

$app = AppFactory::create();

$app->get('/user/{id}', UserController::class . ':getUserInfo');
$app->get('/users', UserController::class . ':getAllUsers');
$app->post('/user', UserController::class . ':createUser');
$app->put('/user/{id}', UserController::class . ':updateUser');
$app->delete('/user/{id}', UserController::class . ':deleteUser');

$app->run();
