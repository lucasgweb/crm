<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AuthHandler;
use src\handlers\ReportHandler;
use src\models\User;

class ReportController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHandler::checkLogin();
        
        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }

    }

    public function reportLeads() {

        $startDate = filter_input(INPUT_GET,'startDate');
        $endDate = filter_input(INPUT_GET,'endDate');
        $userId = filter_input(INPUT_GET,'userId');

        $count = ReportHandler::allReports($startDate, $endDate, $userId);
        $users = User::select()->where('level', 3)->where('status', 1)->get();

        $this->render('reporte-leads',[
            'loggedUser' => $this->loggedUser,
            'count' => $count,
            'users' => $users
        ]);
    }

    public function reportLeadsSeller()
    {
        $startDate = filter_input(INPUT_GET,'startDate');
        $endDate = filter_input(INPUT_GET,'endDate');

        $data = ReportHandler::reportSeller($startDate, $endDate);

        $count = $data['count'];
        $total = $data['total'];

        $this->render('reporte-leads-vendedor',[
            'loggedUser' => $this->loggedUser,
            'count' => $count,
            'total' => $total
        ]);
    }

}