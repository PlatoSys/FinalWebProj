<?php


namespace app\controllers;
use app\database\database;
use app\Router;

class EventController
{
    public function createevent(\app\IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];
        $params = [
            'errors' => $errors,
            'data' => $data
        ];

        $info = new database();

//        $filename = 'C:\xampp\htdocs\Final\views\Events/' . trim($_POST['eventname']). '.php';

        $content2 = "
        <?php
        include_once '../views/_layout.php'; ?>";

        $info->createEvent($_COOKIE['email'],$data['eventname'],$data['duration'],$data['eventdate'],$data['time']);

        return $router->renderView('createevent',$params);
    }

}