<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;

class TypeController extends Controller {

    private $loggedUser; 

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        if ($this->loggedUser === false)
        {
            $this->redirect('/login');
        }

        
    }

    public function index() {

        $this->render('types',[
            'loggedUser' => $this->loggedUser
        ]);
    }

}