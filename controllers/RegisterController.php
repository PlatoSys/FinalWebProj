<?php


namespace app\controllers;
use app\database\database;


use app\IRequest;
use app\Router;

class RegisterController
{
    public function register(IRequest $request,Router $router){
        session_start();
        define('REQUIRED_FIELD_ERROR', 'This field is required');
        $data = $request->getBody();

        if(isset($data['Backtologin'])){
            header("Location: http://localhost:8080/login");
        }
        $errors = [];

        function monthConvert($month){
            if($month == 'January') return '01';
            if($month == 'February') return '02';
            if($month == 'March') return '03';
            if($month == 'April') return '04';
            if($month == 'May') return '05';
            if($month == 'June') return '06';
            if($month == 'July') return '07';
            if($month == 'August') return '08';
            if($month == 'September') return '09';
            if($month == 'October') return '10';
            if($month == 'November') return '11';
            if($month == 'December') return '12';
        }

        if (!$data['registeruser']){
            $errors['registeruser'] = REQUIRED_FIELD_ERROR;
        }

        if (!$data['surname']){
            $errors['surname'] = REQUIRED_FIELD_ERROR;
        }

        if (!$data['email']) {
            $errors['email'] = REQUIRED_FIELD_ERROR;
        } elseif (strpos($data['email'], '@') !== false) {
            echo "";
        } else $errors['email'] = "Not valid Email";

        if(!$data['passwd']){
            $errors['passwd'] = REQUIRED_FIELD_ERROR;
        } elseif (strlen($data['passwd'])<6) {
            $errors['passwd'] = "Password should contain more than 6 character";
        }
        if(!$data['checkpass']){
            $errors['checkpass'] = REQUIRED_FIELD_ERROR;
        }
        $_SESSION['registeruser'] = $data['registeruser'];
        $_SESSION['surname'] = $data['surname'];
        $_SESSION['userstatus'] = $data['userstatus'];
        $_SESSION['email'] = $data['email'];

        $date = $data['birthyear'] .'-' . monthConvert($data['birthmonth']) . '-' . $data['birthday'];

        $data['date'] = $date;
        $input = new database();
        list($success, $message) = $input->getEmail($data['email']);

        if($success != false){
            $errors['email'] = $message;
        }

        if($data['checkpass'] != $data['passwd']){
            $errors['checkpass'] = "Passwords doesn't match";
            $errors['passwd'] = "Passwords doesn't match";
        }
        $params = [
            'errors' => $errors,
            'data' => $data
        ];



        if(empty($errors)) {
            $input->insertStudent($data['registeruser'], $data['surname'], $date, $data['email'], password_hash($data['passwd'], PASSWORD_BCRYPT), $data['userstatus']);
            $filepath = "views/Images/" . $data['email'] . '.png';
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
                $temp  = true;
            };
        }
        if(empty($errors)) {
            session_destroy();
            return $router->renderView('register', $params);
        }
        return $router->renderView('register', $params);
    }
}