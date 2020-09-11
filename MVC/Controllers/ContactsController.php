<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;

class ContactsController extends Controller {
    public function index()
    {
        $contacte = (new ContactModel())->findAll();

        $contact = [];
        foreach ($contacte as $value) {
            $contact[] = (new ContactModel())->hydrate($value)->join();
        }

        $this->render('contact/contact', ['data' => $contact]);
    }



}