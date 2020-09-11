<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\InvoiceModel;

class InvoicesController extends Controller
{
    public function index()
    {
        $info = [
            'invoices' => (new InvoiceModel())->findAll()
        ];

        $invoice = [];
        foreach ($info['invoices'] as $value) {
            $invoice[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $info['invoices'] = $invoice;
/*         echo "<pre>" ;
        var_dump($info);
        echo "</pre>"; */
        $this->render('invoices/invoice', $info);
    }
}