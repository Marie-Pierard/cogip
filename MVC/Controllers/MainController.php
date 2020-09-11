<?php

namespace Cogit\Controllers;

use Cogit\Models\InvoiceModel;
use Cogit\Models\ContactModel;
use Cogit\Models\CompanyModel;

class MainController extends Controller
{
    public function index()
    {   
        $this->render('main/index');
    }
}