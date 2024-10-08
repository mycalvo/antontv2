<?php

namespace App\Controllers;

use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController {
    public function getUserInfo(Request $request, Response $response, $args) {
        $user = User::find($args['id']);
        if ($user) {
            $response->getBody()->write(json_encode($user));
            return $response->withHeader('Content-Type', 'application/json');
        } else {
            return $response->withStatus(404)->write('User not found');
        }
    }

    public function getAllUsers(Request $request, Response $response) {
        $users = User::all();
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function createUser(Request $request, Response $response) {
        $data = $request->getParsedBody();
        $user = User::create($data);
        $response->getBody()->write(json_encode($user));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

    public function updateUser(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $user = User::find($args['id']);
        if ($user) {
            $user->update($data);
            $response->getBody()->write(json_encode($user));
            return $response->withHeader('Content-Type', 'application/json');
        } else {
            return $response->withStatus(404)->write('User not found');
        }
    }

    public function deleteUser(Request $request, Response $response, $args) {
        $user = User::find($args['id']);
        if ($user) {
            $user->delete();
            return $response->withStatus(204);
        } else {
            return $response->withStatus(404)->write('User not found');
        }
    }
}
