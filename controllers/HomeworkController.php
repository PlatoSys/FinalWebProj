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

        if(isset($_POST['taskaddbtn'])){
            $info = new database();
            $info->addTask($_COOKIE['email'],$_POST['subjectselection'],$_POST['taskname'],$_POST['deadline']);
        }

        $filepath = "views/homework/" . $_COOKIE['email'] . $_POST['taskname'] . '.pdf';
        if(isset($_FILES["file"]["tmp_name"])){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
                $temp  = true;
            };
        }



        $params = [
            'errors' => $errors,
            'data' => $data,
            'task' => $tasks
        ];
        return $router->renderView('homework',$params);
    }

}