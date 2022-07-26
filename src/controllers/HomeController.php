<?php
namespace src\controllers;

use \core\Controller;
use src\functions\Upload;
use src\handlers\AuthHandler;
use src\models\User;

class HomeController extends Controller {

    private $loggedUser; 

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        if ($this->loggedUser === false)
        {
            $this->redirect('/login');
        }

        
    }

    public function index() 
    {

        $this->redirect('/usuarios');
        $users = User::select()->get();

        $this->render('home',[
            'loggedUser' => $this->loggedUser
        ]);
    }

}