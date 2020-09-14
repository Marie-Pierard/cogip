<?php

namespace Cogit\Controllers;

use Cogit\Models\CompanyModel;
use Cogit\Models\CountryModel;
use Cogit\Core\Form;
use Cogit\Models\UsersModel;

class CompaniesController extends Controller {
    public function index()
    {

        $companies = [
            'allclients' => (new CompanyModel())->findBy(['idType'=> 1])
        ];

        $country = [];
        foreach($companies['allclients'] as $value){
            $country[] = (new CompanyModel())->hydrate($value)->join();
        }
        $companies['allclients'] = $country;

        $this->render('companies/companies', $companies);
    }
    function add(){
        $countrySelect = (new CountryModel())->findBy(['Country']);
        $country2;
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
        $this->render('formCompany/FormCompany', ['formCompany' => $formCompany->create()]);
    
    }
}