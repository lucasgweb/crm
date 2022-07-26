<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;
use src\models\Category;

class CategoryController extends Controller
{

    private  $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {

        $categorys = Category::select()->get();

        $this->render('categorias', [
            'loggedUser' => $this->loggedUser,
            'categorys' => $categorys
        ]);
    }

    public function store()
    {

        $category =  filter_input(INPUT_POST, 'category');

        if (!empty($category)) {
            Category::insert([
                'category' => $category
            ])->execute();
        }
        $this->redirect('/categorias');
    }

    public function update()
    {
        $id = filter_input(INPUT_POST, 'id');
        $category = filter_input(INPUT_POST, 'category');
        $status = filter_input(INPUT_POST, 'status');

        if ($category && $status && $id) {
            Category::update()
                ->set([
                    'category' => $category,
                    'status' => $status
                ])->where('id', $id)->execute();
        }

        $this->redirect('/categorias');
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id');

        if ($this->loggedUser->level <= 2) {
            Category::delete()->where('id', $id)->execute();
        }
        
        $this->redirect('/categorias');
    }
}
