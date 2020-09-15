<?php

namespace Cogit\Controllers;

use Cogit\Models\CompanyModel;
use Cogit\Models\CountryModel;
use Cogit\Models\ContactModel;
use Cogit\Models\InvoiceModel;
use Cogit\Core\Form;
use Cogit\Models\UsersModel;

class CompaniesController extends Controller {
    public function index()
    {

        $companies = [
            'allclients' => (new CompanyModel())->findBy(['idType'=> 1]),
            'allsuppliers' => (new CompanyModel())->findBy(['idType'=> 2])
        ];

        // set country for allclients with join
        $allclientsCountry = [];
        foreach($companies['allclients'] as $value){
            $allclientsCountry[] = (new CompanyModel())->hydrate($value)->join();
        }
        $companies['allclients'] = $allclientsCountry;

        //set country for allsuppliers with join
        $allsuppliersCountry = [];
        foreach($companies['allsuppliers'] as $value){
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
        $details['contacts'] = $contact->findBy(['idCompany'=>$details['company']->getId()]);


        $invoice = new InvoiceModel();
        $details['invoice'] = $invoice->findBy(['idCompany'=>$details['company']->getId()]);

        $detailinvoice = [];
        foreach($details['invoice'] as $value){
            $detailinvoice[] = (new InvoiceModel())->hydrate($value)->join();
        }
        $details['invoice'] = $detailinvoice;
        // echo '<pre>';
        // var_dump($detailinvoice);
        // echo '</pre>';

        $this->render('companies/details', $details);
    }

    
    function add(){
        $countrySelect = (new CountryModel())->findBy(['Country']);
        $country2 = [];
        foreach($countrySelect as $value){
            $country2[$value->id]=$value->Country;
        };
        $formCompany = new Form();
    
        // On ajoute chacune des parties qui nous intéressent
        $formCompany->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
            ->ajoutLabelFor('Name', 'Company Name')
            ->ajoutInput('Name', 'Name', ['id' => 'Name', 'class' => 'form-control'])
            ->ajoutLabelFor('TVA', 'TVA')
            ->ajoutInput('TVA', 'TVA', ['id' => 'Tva', 'class' => 'form-control'])
            ->ajoutLabelFor('CountrySelect', 'Select a country')
            ->ajoutSelect("Country", $country2,['id'=>"CountrySelect",'class'=>'form-control']) 
            ->ajoutLabelFor('CompanyType', 'Select a type')
            ->ajoutSelect("Type", [1=>'Customer',2=>'Provider'],['id'=>"TypeSelect",'class'=>'form-control']) 
            ->ajoutButton('Add', ['class' => 'btn btn-primary mt-3'])
            ->finForm()
        ;
        if (isset($_POST['Name']) AND isset($_POST['TVA']) AND isset($_POST['Country']) AND isset($_POST['Type'])) {
            $companyName = strip_tags($_POST['Name']);
            $TVA = strip_tags($_POST['TVA']);
            $country = $_POST['Country'];
            $type = $_POST['Type'];
            $company = new CompanyModel();
            $data = [
                'idType'=>$type,
                'idCountry'=>$country,
                'Name'=>$companyName,
                'Tva'=>$TVA
            ];
            $company->requete('INSERT INTO cogit_company (idType,idCountry,Name,Tva) VALUES (:idType,:idCountry,:Name,:Tva)',$data);
            $_SESSION['success'][] = 'Donnée bien ajoutées';

        };
    
        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('formCompany/formCompany', ['formCompany' => $formCompany->create()]);
    
    }
}