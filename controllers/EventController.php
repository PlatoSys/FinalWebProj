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

        $info->createEvent($_COOKIE['email'],$data['eventname'],$data['eventdate'],$data['time']);

        return $router->renderView('createevent',$params);
    }

}