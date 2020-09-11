<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\InvoiceModel;

class InvoicesController extends Controller
{
    public function index()
    {
        $info = [
            'invoice' => (new InvoiceModel())->findAll()
        ];

        $invoice = [];
        foreach ($info['invoice'] as $value) {
            $invoice[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $info['invoice'] = $invoice;
        
        $this->render('invoices/invoice', $invoice);
    }
}