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
            'invoice' => (new InvoiceModel())->limitBy(5, 'DESC', 'date'),
            'contact' => (new ContactModel())->limitBy(5, 'DESC'),
            'company' => (new CompanyModel())->limitBy(5, 'DESC')
        ];

        $details = [];
        foreach ($info['invoice'] as $value) {
            $details[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $info['invoice'] = $details;

        $details = [];
        foreach ($info['contact'] as $value) {
            $details[] = (new ContactModel())->hydrate($value)->join();
        }
        $info['contact'] = $details;

        $details = [];
        foreach ($info['company'] as $value) {
            $details[] = (new CompanyModel())->hydrate($value)->join();
        }
        $info['company'] = $details;

        
        $this->render('main/index', $info);
    }
}