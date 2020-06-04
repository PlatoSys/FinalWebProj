<?php


namespace app\controllers;


use app\database\database;
use app\IRequest;
use app\Router;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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

                $mail->setFrom('moodlesystem@gmail.com');
                $mail->addAddress($_COOKIE['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Password Change';
                $mail->Body = "Here is your credentials <br> User : ".  $_COOKIE['email'] . "<br> New Password : " . $data['newpass'] . " <br>Thank You!";

                $mail->send();
                $mailerror =  'Message has been sent';
            } catch (Exception $e) {
                $mailerror = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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