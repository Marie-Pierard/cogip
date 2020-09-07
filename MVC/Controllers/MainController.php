<?php

namespace Cogit\Controllers;

use Cogit\Models\AnnoncesModel;

class MainController extends Controller
{
    public function index()
    {
        $this->render('main/index');
    }
}