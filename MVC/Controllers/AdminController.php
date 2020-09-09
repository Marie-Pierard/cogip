<?php

namespace Cogit\Controllers;

use Cogit\Core\Form;
use Cogit\Models\UsersModel;

class AdminController extends Controller
{
    public function view(){
        if($_SESSION['user']['role'] === 'admin') {

            $users = new UsersModel();
    
            $this->render('admin/users', ['data' => $users->findAll()]);
        } else {
            $_SESSION['error'][] = 'Erreur veuillez vous connecter en tant qu\'admin.';
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
                $_SESSION['success'][] = "Modification du role de {$user->getEmail()} de {$role} à {$user->getRole()}.";
                header('Location: /admin/view');
                exit;
            }

            $form = new Form;
            $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
                ->ajoutLabelFor('role', "Role de {$user->getEmail()}:")
                ->ajoutSelect('role', ['user' => ' User', 'moderator' => 'Moderateur', 'admin' =>'Admin'], ['id' => 'role', 'class' => 'form-control'])
                ->ajoutButton('Modifier', ['class' => 'btn btn-primary mt-3'])
                ->finForm()
            ;

            $this->render('admin/edit', ['form' => $form->create()]);
        } else {
            $_SESSION['error'][] = 'Erreur veuillez vous connecter en tant qu\'admin.';
            header('Location: /');
        }
    }
}