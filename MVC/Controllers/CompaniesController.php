<?php

namespace Cogit\Controllers;

use Cogit\Models\CompanyModel;
use Cogit\Models\CountryModel;

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
}