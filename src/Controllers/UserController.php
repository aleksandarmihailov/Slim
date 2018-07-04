<?php

namespace App\Controllers;

use App\Application;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\JsonResponse;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Config\Definition\Exception\Exception;

class UserController {

    private $twig;
    private $userService;


    public function __construct($twig, $userService){
        $this->twig = $twig;
        $this->userService = $userService;
    }

    public function listUsers(){
        $users = $this->userService->getAllUsers();
        return $this->twig->render('list.twig', ['users' => $users]);
    }

    public function createDisplay(){
        return $this->twig->render('create.twig');
    }

    public function createUser(Request $request, Response $response){
        $body = $request->getParsedBody();
        $success = $this->userService->createUser($body);
        if($success){
            $users = $this->userService->getAllUsers();
            //return $this->twig->render('list.twig', ['users' => $users]);
            return $response->withStatus(302)->withHeader('Location', '/');
        }
        return $this->twig->render('create.twig', ['message' => 'User is not Created']);
    }
    public function editDisplay(Request $request, Response $response, $id){
        $user = $this->userService->getUserById($id);
        return $this->twig->render('edit.twig', ['user' => $user[0]]);
    }
    public function editUser(Request $request, Response $response, $id){
        $body = $request->getParsedBody();
        $success = $this->userService->editUserById($id, $body);
        if($success){
            return $response->withStatus(302)->withHeader('Location', '/');
        }
        return $response->withStatus(302)->withHeader('Location', '/user/edit/'.$id);
    }
    public function deleteUser(Request $request, Response $response, $id){
        $success = $this->userService->deleteUser($id);
        if($success){
            return $response->withStatus(302)->withHeader('Location', '/');
        }
        return $response->withStatus(302)->withHeader('Location', '/');
    }
}