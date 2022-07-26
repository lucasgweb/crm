<?php

namespace src\controllers;

use \core\Controller;
use src\models\Chat;
use src\models\User;
use src\handlers\AuthHandler;
use src\models\UserRelation;

class ChatController extends Controller
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
        $id = $_SESSION['userTo'];
        if (!empty($id)) {
            $user = User::select()->where('id', $id)->one();
        } else {
            $user = User::select()->where('id', 1)->one();
        }
        $mensages = Chat::select()
        ->where('user_from', $this->loggedUser->id)
        ->andWhere('user_to', $id)
        ->orWhere('user_from', $id)
        ->andWhere('user_to', $this->loggedUser->id)
        ->execute();

        $users = User::select()->where('id', '!=', $this->loggedUser->id)->get();
        
        $this->render('chat', [
            'toUser' => $user,
            'users' => $users,
            'mensages' => $mensages,
            'loggedUser' => $this->loggedUser
        ]);
    }
    public function store()
    {
        $id = filter_input(INPUT_POST, 'id');
        $mensaje = filter_input(INPUT_POST, 'mensaje');
        $date = date('Y/m/d H:m:s');

        if (!empty($mensaje)) {
            Chat::insert([
                'user_from' => $this->loggedUser->id,
                'user_to' => $id,
                'created_at' => $date,
                'mensagem' => $mensaje
            ])->execute();
        } else {
            $_SESSION['userTo'] = $id;
            $this->redirect('/chat');
        }

        $_SESSION['userTo'] = $id;
        $this->redirect('/chat');
    }

    public function chat($id)
    {

        $_SESSION['userTo'] = $id;
        $this->redirect('/chat');
    }
}
