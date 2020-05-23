<?php


namespace app\controllers;
use app\database\database;
use app\IRequest;
use app\Router;

class HomeworkController
{
    public function homework(IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];

        $subj = new database();
        $subj = $subj->getSubject($_COOKIE['email']);
        $data = $subj;

        $tasks = new database();
        $tasks = $tasks->getTasks();

        if(isset($_POST['taskbtn'])){
            $info = new database();
            $info->addTask($_COOKIE['email'],$_POST['hidesubj'],$_POST['taskname'],$_POST['taskdetails'],$_POST['deadlinedate'],$_POST['deadlinetime']);
        }


        $params = [
            'errors' => $errors,
            'data' => $data,
            'task' => $tasks
        ];

        return $router->renderView('homework',$params);
    }

}