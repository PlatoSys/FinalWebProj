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
}