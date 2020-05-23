<?php


namespace app\controllers;
use app\database\database;


use app\Router;

class SubjectController
{
    public function subject(\app\IRequest $request,Router $router)
    {
        $data = $request->getBody();
        $errors = [];
//        if (!$data['email']) {
//            $errors['email'] = "THIS FIELD IS REQUIRED";
//        }
        $info = new database();

        $info->removeSubject($_COOKIE['email']);


        $subj = explode(',',$_COOKIE['gfg']);


        if(!empty(($subj))){
            foreach ($subj as $item){
                $info->addSubject($_COOKIE['email'],$item);
            }
            unset($_COOKIE['gfg']);
        }


        $params = [
            'errors' => $errors,
            'data' => $data
        ];

        return $router->renderView('subject',$params);
    }

}