<?php

namespace Cogit\Controllers;

use Cogit\Models\CountryModel;


class MainController extends Controller
{
    public function index()
    {
        $this->render('main/index');
    }
}