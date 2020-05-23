<?php

namespace app\controllers;

use app\database\database;
use app\IRequest;
use app\Router;

class HomeController
{
    public function home()
    {
        return "Home";
    }

    public function about()
    {
        return "about";
    }

    public function homework(\app\IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];

        $subj = new database();
        $subj = $subj->getSubject($_COOKIE['email']);

        $data = $subj;
        

        if(isset($_POST['taskbtn'])){
            $info = new \app\controllers\database();
            $info->addTask($_COOKIE['email'],$_POST['hidesubj'],$_POST['taskname'],$_POST['taskdetails'],$_POST['deadlinedate'],$_POST['deadlinetime']);
        }

        $params = [
            'errors' => $errors,
            'data' => $data
        ];

        return $router->renderView('homework',$params);
    }

}