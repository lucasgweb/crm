<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;
use src\handlers\LeadHandler;
use src\models\Lead;
use src\models\User;

class MyLeadsController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }

        if($this->loggedUser->level <= 2)
        {
            $this->redirect('/leads');
        }
    }
    public function index()
    {

        $startDate = filter_input(INPUT_GET,'startDate');
        $endDate = filter_input(INPUT_GET,'endDate');
        $saleStatus = filter_input(INPUT_GET,'salestatus');

        $leads = LeadHandler::misLeads($startDate, $endDate, $saleStatus, $this->loggedUser->id);
        $users = User::select()->get();


        $this->render('my-leads', [
            'leads' => $leads,
            'loggedUser' => $this->loggedUser,
            'users' => $users
        ]);
    }

    public function update()
    {
        $status = filter_input(INPUT_POST,'status');
        $id = filter_input(INPUT_POST,'id');
        $comment = filter_input(INPUT_POST,'comment');


        if($status)
        {
            Lead::update()
        ->set('salestatus', $status)
        ->where('id', $id)
        ->execute();
        }

        if($comment)
        {
            Lead::update()
        ->set('comment', $comment)
        ->where('id', $id)
        ->execute();
        }

        

        $this->redirect('/misleads');

    }


}
