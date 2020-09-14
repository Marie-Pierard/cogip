<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\InvoiceModel;
use Cogit\Models\CompanyModel;
use Cogit\Models\ContactModel;

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

    public function add(){
        // On vérifie si notre post contient les champs email et password
        if(Form::validate($_POST, ['NumberInvoice', 'date', 'Company', 'Contact'])){
            // On nettoie le login, l'e-mail et on chiffre le mot de passe
            $NumberInvoice = strip_tags($_POST['NumberInvoice']);
            $date = $_POST['date'];
            $idCompany = strip_tags($_POST['Company']);
            $idContact = strip_tags($_POST['Contact']);

            $newInvoice = new InvoiceModel;
            $valeurs = ['NumberInvoice'=>$NumberInvoice, 'date'=>$date, 'idCompany'=>$idCompany, 'idContact'=>$idContact];
            $newInvoice->requete('INSERT INTO cogit_invoice (NumberInvoice, date, idCompany, idContact) VALUES (:NumberInvoice,:date,:idCompany,:idContact )',$valeurs);
            $_SESSION['success'][] = 'new invoice added.';
            header('Location: /invoices/add');
            exit;
        } else if(isset($_POST['NumberInvoice']) && isset($_POST['date']) && isset($_POST['Company']) && isset($_POST['Contact'])) {
            $_SESSION['warning'][] = 'Attention veuillez remplir les champs correctement.';
        }

        // creation of the CompanyList array
        $companyAll = (new CompanyModel())->findAll();
        foreach($companyAll as $line){
            $companyList[($line->id)] = $line->Name;
        }
        // Creation of the ContactList array
        $contactAll = (new ContactModel())->findAll();
        foreach($contactAll as $line){
            $contactList[($line->id)] = $line->LastName . " " . $line->FirstName;
        }

        $form = new Form;

        $form->debutForm('post', '#', ['style'=>'width: 450px; margin: auto;'])
            ->ajoutLabelFor('NumberInvoice', 'Number of the invoice')
            ->ajoutInput('NumberInvoice', 'NumberInvoice', ['class' => 'form-control', 'id' => 'NumberInvoice'])
            ->ajoutLabelFor('date', 'Date of the invoice')
            ->ajoutInput('date', 'date', ['class' => 'form-control', 'id' => 'date'])
            ->ajoutLabelFor('Company', 'Company')
            ->ajoutSelect('Company', $companyList, ['class' => 'form-control', 'id' => 'Company'])
            ->ajoutLabelFor('Contact', 'Contact')
            ->ajoutSelect('Contact', $contactList, ['class' => 'form-control', 'id' => 'Contact'])
            ->ajoutButton('New Invoice', ['class' => 'btn btn-primary mt-3'])
            ->finForm();
        
        $this->render('invoices/add', ['invoiceForm' => $form->create()]);
    }
}