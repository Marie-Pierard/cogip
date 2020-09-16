<?php

namespace Cogip\Controllers;

use Cogip\Core\Form;
use Cogip\Models\UsersModel;

class AdminController extends Controller
{
    public function view(){
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
                header('Location: /admin/view');
                exit;
            }

            $form = new Form;
            $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
                ->ajoutLabelFor('role', "Role of {$user->getLogin()}:")
                ->ajoutSelect('role', ['user' => ' User', 'moderator' => 'Moderateur', 'admin' =>'Admin'], ['id' => 'role', 'class' => 'form-control'])
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