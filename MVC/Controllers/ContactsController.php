<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\ContactModel;
use Cogit\Models\CompanyModel;

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





    public function add(){
    // On vérifie si notre post contient tous les champs
    if(Form::validate($_POST, ['first_name', 'last_name', 'phone', 'email', 'company'])){
        
        $name = strip_tags($_POST['first_name']);
        $lastName = strip_tags($_POST['last_name']);
        $phone = strip_tags($_POST['phone']);
        $email = strip_tags($_POST['email']);
        $company = strip_tags($_POST['company']);
        $newContact = new ContactModel;
        $valeurs = ['first_name'=>$name, 'last_name'=>$lastName, 'phone'=>$phone, 'email'=>$email, 'company'=>$company];
        $newContact -> requete ('INSERT INTO cogit_contact (idCompany, LastName, FirstName, Phone, Email) VALUES (:company, :last_name, :first_name, :phone, :email)', $valeurs);

        
        $_SESSION['success'][] = 'New contact added.';
        header('Location: /contacts/add');
        exit;
    } else if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
        $_SESSION['warning'][] = 'Attention veuillez remplir les champs correctement.';
    } 
    $companyAll = (new CompanyModel()) -> findAll();
    foreach($companyAll as $line) {
        $companyList[($line->id)] = $line->Name;
    }

    $form = new Form;

    $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
        ->ajoutLabelFor('first_name', 'Your name')
        ->ajoutInput('first_name', 'first_name', ['id' => 'first_name', 'class' => 'form-control'])
        ->ajoutLabelFor('last_name', 'Your last name')
        ->ajoutInput('last_name', 'last_name', ['id' => 'last_name', 'class' => 'form-control'])
        ->ajoutLabelFor('phone', 'Your phone number')
        ->ajoutInput('phone', 'phone', ['id' => 'phone', 'class' => 'form-control'])
        ->ajoutLabelFor('email', 'Your email')
        ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
        ->ajoutLabelFor('company', 'Your company')
        ->ajoutSelect('company', $companyList, ['id' => 'company', 'class' => 'form-control'])
        ->ajoutButton('submit', ['class' => 'btn btn-primary mt-3'])
        ->finForm();
    
    $this->render('contact/add', ['newContactForm' => $form->create()]);
    }


}