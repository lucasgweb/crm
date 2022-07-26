<?php

namespace src\controllers;

use \core\Controller;
use src\functions\Upload;
use src\handlers\AuthHandler;
use src\models\Lead;
use src\models\User;

class UserController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        
        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }

    }

    public function index()
    {

        $users = User::select()->get();
        $this->render('users', [
            'users' => $users,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function store()
    {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $level = filter_input(INPUT_POST, 'level');

        if (!empty($name && $email && $password && $level)) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            if (AuthHandler::emailExists($email) == false) {
                User::insert([
                    'name' => ucwords($name),
                    'email' => strtolower($email),
                    'password' => $password,
                    'level' => $level
                ])->execute();
            }
        }

        $this->redirect('/usuarios');
    }

    public function delete($id)
    {

        $lead = Lead::select()->where('id', $id)->one();

        if(!($this->loggedUser->level >= 2) && !($lead['level'] == 1) )
        {

        Lead::update()
        ->set('user_id', 0)
        ->where('user_id', $id)
        ->execute();

        User::delete()->where('id', $id)->execute(); 
        } 
        
        $this->redirect('/usuarios');
    }



    public function edit()
    {

        
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $level = filter_input(INPUT_POST, 'level');
        $status = filter_input(INPUT_POST, 'status');

          $user = User::select()->where('id', $id)->one();

          if(!($this->loggedUser->level >= 2) && !($user['level'] == 1) )
        {
            if(empty($password))
          {
            $password = $user['password'];
            
          } else {

            $password = password_hash($password, PASSWORD_DEFAULT);

          }

        User::update()
            ->set([
                'name' => ucwords(($name) ?? $user['name']),
                'email' => strtolower(($email) ?? $user['email']),
                'password' => $password,
                'level' => ($level) ?? $user['level'],
                'status' => ($status) ?? $user['status']
            ])
            ->where('id', $id)
            ->execute();  
        }

            $this->redirect('/usuarios');
    }

    public function editProfile()
    {
        $this->render('edit-profile',[
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function editProfileAction()
    {

        $path = Upload::storeImg($_FILES['photo']);
        User::update()
        ->set([
            'photo' => $path
        ])
        ->where('id', $this->loggedUser->id)
        ->execute();

        $this->redirect('/usuarios');
    }
}
