<?php

namespace Cogit\Controllers;

use Cogit\Core\Db;

class MainController extends Controller
{
    public function index()
    {
        if(isset($_SESSION['user'])){
            $this->render('main/index');
        } else {
            header('Location: /users/login');
            exit;
        }
    }
}