<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;
use src\handlers\LeadHandler;
use src\models\Lead;
use src\models\User;

class LeadController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }

        if($this->loggedUser->level > 2)
        {
            $this->redirect('/misleads');
        }
    }
    public function index()
    {

        $startDate = filter_input(INPUT_GET,'startDate');
        $endDate = filter_input(INPUT_GET,'endDate');
        $userId = filter_input(INPUT_GET,'userId');

        $leads = LeadHandler::all($startDate, $endDate, $userId);
        $users = User::select()->where('level', 3)->where('status', 1)->get();


        $this->render('leads', [
            'leads' => $leads,
            'loggedUser' => $this->loggedUser,
            'users' => $users
        ]);
    }

    public function update()
    {

        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $curso = filter_input(INPUT_POST, 'curso');
        $channel = filter_input(INPUT_POST, 'channel');
        $comment = filter_input(INPUT_POST, 'comment');
        $user = filter_input(INPUT_POST,'user_id');

        $lead = Lead::select()->where('id', $id)->one();
        
        Lead::update()
            ->set([
                'name' => ($name) ?? $lead['name'],
                'email' => ($email) ?? $lead['email'],
                'phone' => ($phone) ?? $lead['phone'],
                'curso' => ($curso) ?? $lead['curso'],
                'channel' => ($channel) ?? $lead['channel'],
                'comment' => ($comment) ?? $lead['comment'],
                'user_id' => ($user) ?? $lead['user_id']
            ])
            ->where('id', $id)
            ->execute();
        
            $this->redirect('/leads');
        }

    public function delete($id)
    {
        $id = filter_input(INPUT_GET,'id');
        if($this->loggedUser->level <= 2)
        {
          Lead::delete()->where('id', $id)->execute();  
        }
        
        $this->redirect('/leads');
    }
    
   public function store()
    {
        
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $curso = filter_input(INPUT_POST, 'curso');
        $channel = filter_input(INPUT_POST, 'channel');
        $comment = filter_input(INPUT_POST, 'comment');
        $user = filter_input(INPUT_POST,'user_id');
        $date = date('Y-m-d H:m:s');
        
        if($name && $email && $phone && $curso && $channel && $user && $date)
        {
           Lead::insert([
    'name' => $name,
    'user_id' => $user,
    'email' => $email,
    'phone' => $phone,
    'curso' => $curso,
    'channel' => $channel,
    'comment' => $comment,
    'created_at' => $date
    ])->execute(); 
    
        }
        
    $this->redirect('/leads');
    }

    public function import()
    {

        $this->render('import-lead',[
            'loggedUser' => $this->loggedUser
        ]);
    }
}
