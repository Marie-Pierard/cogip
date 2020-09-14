<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;
use Cogit\Models\InvoiceModel;

class ContactsController extends Controller {
    public function index()
    {
        $contacts = (new ContactModel())->findAll();

        $contact = [];
        foreach ($contacts as $value) {
            $contact[] = (new ContactModel())->hydrate($value)->join();
        }

        $this->render('contact/contact', ['data' => $contact]);
    }

    public function details(int $id){
        $contact = new ContactModel();
        $contact->hydrate($contact->find($id))->join();

        $invoices = (new InvoiceModel())->findBy(['idCompany' => $contact->getCompany()->getId()]);

        $lstInvoices = [];
        foreach($invoices as $line){
            $lstInvoices[] = (new InvoiceModel())->hydrate($line);
        }

        $this->render('contact/details', ['contact' => $contact, 'invoices' => $lstInvoices]);
    }
}