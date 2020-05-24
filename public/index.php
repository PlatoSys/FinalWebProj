<?php

require_once __DIR__."/../vendor/autoload.php";

use app\controllers\EventController;
use app\controllers\HomeController;
use app\controllers\HomeworkController;
use app\controllers\LoginController;
use app\controllers\ProfileController;
use app\controllers\RegisterController;
use app\controllers\SubjectController;

$router = new \app\Router(new \app\Request());

$router->get('/', 'home');

$router->post('/',[HomeController::class,'/']);


$router->get('/login','login');

$router->post('/login',[LoginController::class,'login']);


$router->get('/createevent','createevent');

$router->post('/createevent',[EventController::class,'createevent']);


$router->get('/subject','subject');

$router->post('/subject', [SubjectController::class,'subject']);


$router->get('/register','register');

$router->post('/register',[RegisterController::class,'register']);


$router->get('/homework','homework');

$router->post('/homework', [HomeworkController::class,'homework']);


$router->get('/profile','profile');

$router->post('/profile',[ProfileController::class,'profile']);


$router->get('/password','/password');

$router->post('/password',[ProfileController::class,'password']);


$router->get('/picture','/picture');

$router->post('/picture',[ProfileController::class,'picture']);


$router->resolve();

