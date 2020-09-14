<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;
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
        $this->render('invoices/invoice', $info);
    }

    public function details(int $id){
        $details = [
            'company' => (new InvoiceModel())->hydrate((new InvoiceModel())->find($id))->join()
        ];

        $contacts = new ContactModel();
        $details['contacts'] = $contacts->findBy(['idCompany'=>$details['company']->getIdCompany()]);

        $this->render('invoices/details', $details);
    }
}