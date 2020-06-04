<?php


namespace app\controllers;
use app\database\database;


use app\IRequest;
use app\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

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
            $filepath = "C:/xampp\htdocs\Final\public\Images/" . $data['email'] . '.png';
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
                $temp  = true;
            };
            $mail = new PHPMailer(false);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '2c65f47d0b6866';                     // SMTP username
                $mail->Password   = '3b7a61fd997183';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                $mail->setFrom('moodlesystem@gmail.com', 'New Account Creation');
                $mail->addAddress($data['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Welcome to our MoodleSystem';
                $mail->AltBody = "Here is your credentials <br> User :" . $data["email"] . "<br>" . "Password : " . $data['passwd'] . "<br> Thank You!";
                $mail->Body = "Here is your credentials <br> User :" . $data["email"] . "<br>" . "Password : " . $data['passwd'] . "<br> Thank You!";

    $mail->send();
                $mailerror =  'Message has been sent';
            } catch (Exception $e) {
                $mailerror = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        if(empty($errors)) {
            session_destroy();
            return $router->renderView('register', $params);
        }
        return $router->renderView('register', $params);
    }
}