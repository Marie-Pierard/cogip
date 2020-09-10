<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;

class ContactController extends Controller {
    public function index()
    {
        $this->render('contact/contact');
    }
}