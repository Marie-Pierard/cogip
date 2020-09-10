<?php

namespace Cogit\Controllers;

use Cogit\Models\TypeModel;


class MainController extends Controller
{
    public function index()
    {
        $t = new TypeModel();

        $tmp = $t->hydrate($t->find(2));

        $this->render('main/index', ['test' => $tmp]);
    }
}