<?php

namespace Cogit\Controllers;

use Cogit\Models\InvoiceModel;
use Cogit\Models\ContactModel;
use Cogit\Models\CompanyModel;

class MainController extends Controller
{
    public function index()
    {   
<<<<<<< HEAD
        $this->render('main/index');
=======
        $info = [
            'invoice' => (new InvoiceModel())->limitBy(5, 'DESC', 'date'),
            'contact' => (new ContactModel())->limitBy(5, 'DESC'),
            'company' => (new CompanyModel())->limitBy(5, 'DESC')
        ];

        $invoice = [];
        foreach ($info['invoice'] as $value) {
            $invoice[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $info['invoice'] = $invoice;

        
        $this->render('main/index', $info);
>>>>>>> d184e31ab038c9b867e815c08383b26b4325f95b
    }
}