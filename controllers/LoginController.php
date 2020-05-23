<?php

namespace app\controllers;
use app\database\database;
use app\Router;

class LoginController
{
    public function login(\app\IRequest $request,Router $router)
    {
        session_start();
        define('REQUIRED_FIELD_ERROR', 'This field is required');
        $data = $request->getBody();

        if(isset($data['signupbtn'])){
            header("Location: http://localhost:8080/register");
        }

        $errors = [];

        $_SESSION['username'] = $data['username'];

        $insert = new database();
        $info1 = $insert->getUser($data['username'],$data['userpassword']);

        if(isset($info1[0])) {
            if ($info1[0] != true) {
                if ($info1[1] == 'user doesnt exists') {
                    $errors['username'] = "user doesnt exists";
                }
                if ($info1[1] == 'Password is incorrect') {
                    $errors['userpassword'] = "Password is incorrect";
                }
            }
            if (!$data['username']) {
                $errors['username'] = REQUIRED_FIELD_ERROR;
            }
        }


        if (!$data['userpassword']) {
            $errors['userpassword'] = REQUIRED_FIELD_ERROR;
        }

        $params = [
            'errors' => $errors,
            'data' => $data
        ];

        if(empty($errors)) {
            setcookie("firstname",$info1[0]['firstname'],time() + 25000);
            setcookie("lastname",$info1[0]['lastname'],time() + 25000);
            setcookie("birthdate",$info1[0]['birthdate'],time() + 25000);
            setcookie("email",$info1[0]['email'],time() + 25000);
            setcookie("status",$info1[0]['status'],time() + 25000);
            return $router->renderView('/', $params);
        } else
            return $router->renderView('login', $params);
    }

}