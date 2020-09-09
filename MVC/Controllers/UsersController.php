<?php

namespace Cogit\Controllers;

use Cogit\Core\Form;
use Cogit\Models\UsersModel;

class UsersController extends Controller
{
    public function login()
    {
        if(Form::validate($_POST, ['email', 'password'])){
            $userModel = new UsersModel;
            $userArray = $userModel->findOneByEmail(strip_tags($_POST['email']));

            if(!$userArray){
                $_SESSION['error'][] = 'Erreur de login ou mot de passe.';
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
                $_SESSION['error'][] = 'Erreur de login ou mot de passe.';
            }
        } else if(isset($_POST['email']) && isset($_POST['password'])) {
            $_SESSION['warning'][] = 'Attention veuillez remplir les champs correctement.';
        }

        // On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
            ->ajoutLabelFor('email', 'Email :')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Mot de passe :')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutButton('Me connecter', ['class' => 'btn btn-primary mt-3'])
            ->finForm()
        ;

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('users/login', ['form' => $form->create()]);

    }

    public function register(){
        // On vérifie si notre post contient les champs email et password
        if(Form::validate($_POST, ['email', 'password'])){
            // On nettoie l'e-mail et on chiffre le mot de passe
            $email = strip_tags($_POST['email']);
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $user = new UsersModel;
            $user->setEmail($email)
                 ->setPsw($pass)
                 ->setRole('user');
            $user->create();
            $_SESSION['success'][] = 'Inscription réussie.';
            header('Location: /');
            exit;
        }

        $form = new Form;

        $form->debutForm('post', '#', ['style'=>'width: 250px; margin: auto;'])
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->ajoutLabelFor('pass', 'Mot de passe :')
            ->ajoutInput('password', 'password', ['id' => 'pass', 'class' => 'form-control'])
            ->ajoutButton('M\'inscrire', ['class' => 'btn btn-primary mt-3'])
            ->finForm();
        
        $this->render('users/register', ['registerForm' => $form->create()]);
    }

    /**
     * Déconnexion de l'utilisateur
     * @return exit 
     */
    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['success'][] = 'Déconnexion réussie.';
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }
}