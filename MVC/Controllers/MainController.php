<?php

namespace Cogit\Controllers;

use Cogit\Models\InvoiceModel;
use Cogit\Models\ContactModel;
use Cogit\Models\CompanyModel;

class MainController extends Controller
{
    public function index()
    {   
        $info = [
            'invoice' => (new InvoiceModel())->limitById(5, 'DESC'),
            'contact' => (new ContactModel())->limitById(5, 'DESC'),
            'company' => (new CompanyModel())->limitById(5, 'DESC')
        ];
        $this->render('main/index', $info);
    }
}