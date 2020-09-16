<?php

namespace Cogip\Controllers;
use Cogip\Core\Form;
use Cogip\Models\ContactModel;
use Cogip\Models\CompanyModel;
use Cogip\Models\InvoiceModel;

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
        $newContact -> requete ('INSERT INTO cogip_contact (idCompany, LastName, FirstName, Phone, Email) VALUES (:company, :last_name, :first_name, :phone, :email)', $valeurs);

        
        $_SESSION['success'][] = 'New contact added.';
        header('Location: /contacts/add');
        exit;
    } else if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
        $_SESSION['warning'][] = 'Be careful, fill in the form correctly.';
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

    public function delete(int $id){
        if($_SESSION['user']['role'] === 'admin') {
            (new ContactModel())->delete($id);
            $_SESSION['success'][] = 'Data deleted.';
            header('Location: /contacts');
            exit;
        }
    }


}