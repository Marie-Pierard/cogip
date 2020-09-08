<?php

namespace Cogit\Controllers;

use Cogit\Core\Db;

class MainController extends Controller
{
    public function index()
    {
        Db::getInstance();
        $this->render('main/index');
    }
}