<?php

namespace Cogip\Controllers;

use Cogip\Core\Form;
use Cogip\Models\UsersModel;

class UsersController extends Controller
{
    public function login()
    {
        if(Form::validate($_POST, ['login', 'password'])){
            $userModel = new UsersModel;
            $userArray = $userModel->findOneByLogin(strip_tags($_POST['login']));

            if(!$userArray){
                $_SESSION['error'][] = 'Wrong username or password.';
                http_response_code(404);
                header('Location: /');
                exit;
            }

            $user = $userModel->hydrate($userArray);
            
            if(password_verify($_POST['password'], $user->getPsw())){
                $user->setSession();
                header('Location: /');
                exit;
            } else {
                $_SESSION['error'][] = 'Wrong username or password.';
            }
        } else if(isset($_POST['login']) && isset($_POST['password'])) {
            $_SESSION['warning'][] = 'Be careful, fill in the form correctly.';
        }

        // On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
            ->ajoutLabelFor('login', 'Your username')
            ->ajoutInput('login', 'login', ['id' => 'login', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Your password')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutButton('Log in', ['class' => 'btn btn-primary mt-3'])
            ->finForm()
        ;

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('users/login', ['form' => $form->create()]);

    }

    public function register(){
        // On vérifie si notre post contient les champs email et password
        if(Form::validate($_POST, ['login', 'email', 'password'])){
            // On nettoie le login, l'e-mail et on chiffre le mot de passe
            $login = strip_tags($_POST['login']);
            $email = strip_tags($_POST['email']);
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $user = new UsersModel;
            $user->setLogin($login)
                 ->setEmail($email)
                 ->setPsw($pass)
                 ->setRole('user');
            $user->create();
            $_SESSION['success'][] = 'You are now a member!';
            header('Location: /');
            exit;
        } else if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
            $_SESSION['warning'][] = 'Be careful, fill in the form correctly.';
        }

        $form = new Form;

        $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
            ->ajoutLabelFor('login', 'Your username')
            ->ajoutInput('login', 'login', ['class' => 'form-control', 'id' => 'login'])
            ->ajoutLabelFor('email', 'Your E-mail address')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->ajoutLabelFor('pass', 'Your password')
            ->ajoutInput('password', 'password', ['id' => 'pass', 'class' => 'form-control'])
            ->ajoutButton('Sign up', ['class' => 'btn btn-primary mt-3'])
            ->finForm();
        
        $this->render('users/register', ['registerForm' => $form->create()]);
    }

    /**
     * Déconnexion de l'utilisateur
     * @return exit 
     */
    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['success'][] = 'Log out completed.';
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }
}