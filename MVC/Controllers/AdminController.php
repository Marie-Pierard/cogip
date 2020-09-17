<?php

namespace Cogip\Controllers;

use Cogip\Core\Form;
use Cogip\Models\UsersModel;
use Cogip\Models\InvoiceModel;
use Cogip\Models\ContactModel;
use Cogip\Models\CompanyModel;

class AdminController extends Controller
{
    public function index(){
        if($_SESSION['user']['role'] === 'admin') {
            $info = [
                'invoice' => (new InvoiceModel())->limitBy(5, 'DESC', 'date'),
                'contact' => (new ContactModel())->limitBy(5, 'DESC'),
                'company' => (new CompanyModel())->limitBy(5, 'DESC')
            ];

            $details = [];
            foreach ($info['invoice'] as $value) {
                $details[] = (new InvoiceModel())->hydrate($value)->join();
            }
            $info['invoice'] = $details;

            $details = [];
            foreach ($info['contact'] as $value) {
                $details[] = (new ContactModel())->hydrate($value)->join();
            }
            $info['contact'] = $details;

            $details = [];
            foreach ($info['company'] as $value) {
                $details[] = (new CompanyModel())->hydrate($value)->join();
            }
            $info['company'] = $details;

            
            $this->render('admin/index', $info);
        } else {
            $_SESSION['error'][] = 'Error, please log-in as an admin.';
            header('Location: /');
        }
    }

    public function users(){
        if($_SESSION['user']['role'] === 'admin') {

            $users = new UsersModel();
            
            $this->render('admin/users', ['data' => $users->findAll()]);
        } else {
            $_SESSION['error'][] = 'Error, please log-in as an admin.';
            header('Location: /');
        }
    }

    public function edit(int $id){
        if($_SESSION['user']['role'] === 'admin') {
            $user = new UsersModel();
            $user->hydrate($user->find($id));
    
            if(Form::validate($_POST, ['role'])){
                $role = $user->getRole();
                $user->setRole($_POST['role']);
                $user->update();
                $_SESSION['success'][] = "Role of {$user->getLogin()} changed from {$role} to {$user->getRole()}.";
                header('Location: /admin/users');
                exit;
            }

            $form = new Form;
            $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
                ->ajoutLabelFor('role', "Role of {$user->getLogin()}:")
                ->ajoutSelect('role', ['user' => ' User', 'moderator' => 'Moderator', 'admin' =>'Administrator'], ['id' => 'role', 'class' => 'form-control'])
                ->ajoutButton('Modify', ['class' => 'btn btn-primary mt-3'])
                ->finForm()
            ;

            $this->render('admin/edit', ['form' => $form->create()]);
        } else {
            $_SESSION['error'][] = 'Error, please log-in as an admin.';
            header('Location: /');
        }
    }
}