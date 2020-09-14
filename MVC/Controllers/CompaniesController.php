<?php

namespace Cogit\Controllers;

use Cogit\Models\CompanyModel;
use Cogit\Models\CountryModel;
use Cogit\Models\ContactModel;
use Cogit\Models\InvoiceModel;

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

        echo '<pre>';
        var_dump($details);
        echo '</pre>';

        $this->render('companies/details', $details);
    }
}