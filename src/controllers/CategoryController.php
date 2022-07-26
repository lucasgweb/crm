<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;

class CategoryController extends Controller {

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

        $this->render('categorias',[
            'loggedUser' => $this->loggedUser
        ]);
    }

}