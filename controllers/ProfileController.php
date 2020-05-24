<?php


namespace app\controllers;


use app\database\database;
use app\IRequest;
use app\Router;

class ProfileController
{
    public function password(IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];

        $insert = new database();
        $info1 = $insert->getUser($_COOKIE['email'],$data['oldpass']);

        if($info1[0] == false){
            $errors['oldpass'] = "Incorrect Password";
        }

        if(strlen($data['newpass'])  < 6 ){
            $errors['newpass'] = "Password size should be more than 6 char";
        }

        if($data['newpass'] != $data['newcheckpass']){
            $errors['newpass'] = "Passwords doesn't match";
            $errors['newcheckpass'] = "Passwords doesn't match";
        }

        if(!$data['oldpass']){
            $errors['oldpass'] = "This Field is Required";
        }
        if(!$data['newpass']){
            $errors['newpass'] = "This Field is Required";
        }
        if(!$data['newcheckpass']){
            $errors['newcheckpass'] = "This Field is Required";
        }
        if(empty($errors)){
            $passchange = new database();
            $passchange->NewPass($_COOKIE['email'],password_hash($data['newpass'],PASSWORD_BCRYPT));
        }

        $params = [
            'errors' => $errors,
            'data' => $data,
        ];

        return $router->renderView('password',$params);

    }

    public function picture(IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];

        $filepath = "../public/Images/" . $_COOKIE['email'] . '.png';
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
            $temp  = true;
        };

        $params = [
            'errors' => $errors,
            'data' => $data,
        ];

        return $router->renderView('picture',$params);

    }

}