<?php

namespace Cogip\Controllers;

use Cogip\Models\CompanyModel;
use Cogip\Models\CountryModel;
use Cogip\Models\ContactModel;
use Cogip\Models\InvoiceModel;
use Cogip\Core\Form;
use Cogip\Models\UsersModel;

class CompaniesController extends Controller
{

    public function index()
    {

        $companies = [
            'allclients' => (new CompanyModel())->findBy(['idType' => 1], 'Name'),
            'allsuppliers' => (new CompanyModel())->findBy(['idType' => 2], 'Name')
        ];

        // set country for allclients with join
        $allclientsCountry = [];
        foreach ($companies['allclients'] as $value) {
            $allclientsCountry[] = (new CompanyModel())->hydrate($value)->join();
        }
        $companies['allclients'] = $allclientsCountry;

        //set country for allsuppliers with join
        $allsuppliersCountry = [];
        foreach ($companies['allsuppliers'] as $value) {
            $allsuppliersCountry[] = (new CompanyModel())->hydrate($value)->join();
        }
        $companies['allsuppliers'] = $allsuppliersCountry;

        $this->render('companies/companies', $companies);
    }

    public function details(int $id)
    {
        $details = [
            'company' => (new CompanyModel())->hydrate((new CompanyModel())->find($id))->join()
        ];

        $contact = new ContactModel();
        $details['contacts'] = $contact->findBy(['idCompany' => $details['company']->getId()]);


        $invoice = new InvoiceModel();
        $details['invoice'] = $invoice->findBy(['idCompany' => $details['company']->getId()]);

        $detailinvoice = [];
        foreach ($details['invoice'] as $value) {
            $detailinvoice[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $details['invoice'] = $detailinvoice;

        $this->render('companies/details', $details);
    }

    function add()
    {
        if ($_SESSION['user']['role'] === 'admin' or $_SESSION['user']['role'] === 'moderator') {
            $countrySelect = (new CountryModel())->findBy(['Country']);
            $country2 = [];
            foreach ($countrySelect as $value) {
                $country2[$value->id] = $value->Country;
            };
            $formCompany = new Form($_POST);

            // On ajoute chacune des parties qui nous intéressent
            $formCompany->debutForm('post', '#', ['style' => 'width: 250px; margin: auto;'])
                ->ajoutLabelFor('Name', 'Company Name')
                ->ajoutInput('Name', 'Name', ['id' => 'Name', 'class' => 'form-control'])
                ->ajoutLabelFor('TVA', 'TVA')
                ->ajoutInput('TVA', 'TVA', ['id' => 'Tva', 'class' => 'form-control'])
                ->ajoutLabelFor('CountrySelect', 'Select a country')
                ->ajoutSelect("Country", $country2, ['id' => "CountrySelect", 'class' => 'form-control'])
                ->ajoutLabelFor('CompanyType', 'Select a type')
                ->ajoutSelect("Type", [1 => 'Customer', 2 => 'Provider'], ['id' => "TypeSelect", 'class' => 'form-control'])
                ->ajoutButton('Add', ['class' => 'btn btn-primary mt-3'])
                ->finForm();
            if (isset($_POST['Name']) and isset($_POST['TVA']) and isset($_POST['Country']) and isset($_POST['Type'])) {
                $companyName = strip_tags($_POST['Name']);
                $TVA = strip_tags($_POST['TVA']);
                $country = $_POST['Country'];
                $type = $_POST['Type'];
                $company = new CompanyModel();
                $data = [
                    'idType' => $type,
                    'idCountry' => $country,
                    'Name' => $companyName,
                    'Tva' => $TVA
                ];
                $company->requete('INSERT INTO cogip_company (idType,idCountry,Name,Tva) VALUES (:idType,:idCountry,:Name,:Tva)', $data);
                $_SESSION['success'][] = 'Data added.';
                header('Location: /companies/add');
                exit;
            };

            // On envoie le formulaire à la vue en utilisant notre méthode "create"
            $this->render('formCompany/formCompany', ['formCompany' => $formCompany->create()]);
        } else {
            $_SESSION['error'][] = 'Error, please log-in as a moderator or an admin.';
            header('Location: /');
        }
    }

    public function delete(int $id){
        $details = [
            'company' => (new CompanyModel())->hydrate((new CompanyModel())->find($id))->join()
        ];
        if($_SESSION['user']['role'] === 'admin') {
            $invoice = new InvoiceModel();
            $toDeleteInvoices['invoice'] = $invoice->findBy(['idCompany'=>$details['company']->getId()]);
            foreach($toDeleteInvoices['invoice'] as $value){
                $idInvoice = $value->id;
                ($invoice)->delete($idInvoice);
            };
            $contact = new ContactModel();
            $toDeleteContacts['contact'] = $contact->findBy(['idCompany'=>$details['company']->getId()]);
            foreach($toDeleteContacts['contact'] as $value){
                $idContact = $value->id;
                ($contact)->delete($idContact);
            };
            (new CompanyModel())->delete($id);
            $_SESSION['success'][] = 'Company and linked contact and invoices deleted';
            header('Location: /companies');
            exit;
        }
    }
}
