<?php

namespace Cogit\Controllers;
use Cogit\Core\Form;
use Cogit\Models\CompanyModel;

class CompaniesController extends Controller {
    public function index()
    {
        $this->render('companies/companies', ['clients' => (new CompanyModel())->limitById(5, 'ASC'), 'suppliers' => (new CompanyModel())->limitById(6,'ASC')]);
    }
}