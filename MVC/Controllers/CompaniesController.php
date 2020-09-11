<?php

namespace Cogit\Controllers;

use Cogit\Models\CompanyModel;
use Cogit\Models\CountryModel;

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
}