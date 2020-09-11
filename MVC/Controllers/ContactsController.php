<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;

class ContactsController extends Controller {
    public function index()
    {
        $this->render('contact/contact');
    }
    public function view(){
        $contact = new ContactModel();
        $this->render('contact/contact', ['data' => $contact->findAll()]);
   
    }



}