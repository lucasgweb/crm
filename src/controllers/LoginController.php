<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;
use src\models\User;

class LoginController extends Controller
{


    public function index()
    {


        if (AuthHandler::checkLogin())
        {
            $this->redirect('/');
        }

        $this->render('login');
    }
    public function auth()
    {
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,'password');

        if ($email && $password)
        {
            $token = AuthHandler::verifyLogin($password, $email);

            if($token)
            {
                $_SESSION['token'] = $token;

                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'E-mail e/ou Senha não conferem.';
                $this->redirect('/login');
            }
        } else {
            $this->redirect('/login');
        }
    }

    public function logout($id)
    {
        $_SESSION['token'] = '';

        User::update()
        ->set(['token' => '0'])
        ->where('id', $id)
        ->execute();

        $_SESSION['token'] = '';
        $this->redirect('/login');

    }
}
