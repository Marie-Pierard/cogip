<?php

namespace Cogip\Controllers;

use Cogip\Core\Form;
use Cogip\Models\InvoiceModel;
use Cogip\Models\CompanyModel;
use Cogip\Models\ContactModel;

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
    public function details(int $id)
    {
        $details = [
            'company' => (new InvoiceModel())->hydrate((new InvoiceModel())->find($id))->join()
        ];

        $contact = new ContactModel();
        $details['contacts'] = $contact->findBy(['idCompany' => $details['company']->getIdCompany()]);

        $this->render('invoices/details', $details);
    }

    public function add()
    {
        if($_SESSION['user']['role'] === 'admin' OR $_SESSION['user']['role'] === 'moderator' ) {
        $_SESSION['js'][] = 'CompanyContact';
        // On vérifie si notre post contient les champs email et password
        if (Form::validate($_POST, ['NumberInvoice', 'date', 'Company', 'Contact'])) {
            // On nettoie le login, l'e-mail et on chiffre le mot de passe
            $NumberInvoice = strip_tags($_POST['NumberInvoice']);
            $date = $_POST['date'];
            $idCompany = strip_tags($_POST['Company']);
            $idContact = strip_tags($_POST['Contact']);

            $newInvoice = new InvoiceModel;
            $valeurs = ['NumberInvoice' => $NumberInvoice, 'date' => $date, 'idCompany' => $idCompany, 'idContact' => $idContact];
            $newInvoice->requete('INSERT INTO cogip_invoice (NumberInvoice, date, idCompany, idContact) VALUES (:NumberInvoice,:date,:idCompany,:idContact )', $valeurs);
            $_SESSION['success'][] = 'new invoice added.';
            header('Location: /invoices/add');
            exit;
        } else if (isset($_POST['NumberInvoice']) && isset($_POST['date']) && isset($_POST['Company']) && isset($_POST['Contact'])) {
            $_SESSION['warning'][] = 'Be careful, fill in the form correctly.';
        }

        // creation of the CompanyList array
        $companyAll = (new CompanyModel())->findAll();
        foreach ($companyAll as $line) {
            $companyList[($line->id)] = $line->Name;
        }
        // Creation of the ContactList array
        $contactAll = (new ContactModel())->findAll();
        foreach ($contactAll as $line) {
            $contactList[($line->id)] = $line->LastName . " " . $line->FirstName;
        }

        $form = new Form($_POST);

        $form->debutForm('post', '#', ['style' => 'width: 450px; margin: auto;'])
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

        $this->render('invoices/add', ['invoiceForm' => $form->create(), 'dataJs' => $this->generateDataJs()]);
    }
    else {
        $_SESSION['error'][] = 'Error, please log-in as a moderator or an admin.';
        header('Location: /');
        }
    }

    private function generateDataJs(){
        $data = [];
        $contactAll = (new ContactModel())->findAll();
        $companyAll = (new CompanyModel())->findAll();

        foreach($companyAll as $company){
            $data[$company->id] = [];
            foreach($contactAll as $contact){
                if($contact->idCompany == $company->id) $data[$company->id][] = $contact->id;
            }
        }
        
        $html = '';
        foreach($data as $key => $line){
            if(!empty($line)){
                $html .= "<span id=\"company-{$key}\" data-contact=\"";
                foreach($line as $contact){
                    $html .= "{$contact}-";
                }
                $html = substr($html, 0, -1)."\"></span>";
            }
        }
        return $html;
    }

    public function delete(int $id){
        if($_SESSION['user']['role'] === 'admin') {
            (new InvoiceModel())->delete($id);
            $_SESSION['success'][] = 'Invoice deleted';
            header('Location: /invoices');
            exit;
        }
    }
}
