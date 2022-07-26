<?php

namespace src\handlers;

use src\models\Lead;
use src\models\User;

class LeadHandler
{
    public static function all($startDate, $endDate, $userId)
    {


        if ($startDate && $endDate && empty($userId)) {
            $leads = Lead::select(['leads.id', 'leads.name_lead', 'leads.curso', 'leads.phone', 'leads.status', 'leads.email', 'leads.comment', 'leads.salestatus', 'leads.created_at', 'leads.channel', 'u.name_user'])
                ->join('users as u', 'leads.user_id', '=', 'u.id')
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->get();
        } elseif ($startDate && $endDate && $userId > 0) {

            $leads = Lead::select(['leads.id', 'leads.name_lead', 'leads.curso', 'leads.phone', 'leads.status', 'leads.email', 'leads.comment', 'leads.salestatus', 'leads.created_at', 'leads.channel', 'u.name_user'])
                ->join('users as u', 'leads.user_id', '=', 'u.id')
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->Where('user_id', $userId)
                ->get();
        } elseif (empty($startDate) && empty($endDate) && $userId > 0) {
            $leads = Lead::select(['leads.id', 'leads.name_lead', 'leads.curso', 'leads.phone', 'leads.status', 'leads.email', 'leads.comment', 'leads.salestatus', 'leads.created_at', 'leads.channel', 'u.name_user'])
                ->join('users as u', 'leads.user_id', '=', 'u.id')->where('user_id', $userId)->get();
        } else {
            $leads = Lead::select(['leads.id', 'leads.name_lead', 'leads.curso', 'leads.phone', 'leads.status', 'leads.email', 'leads.comment', 'leads.salestatus', 'leads.created_at', 'leads.channel', 'u.name_user'])
                ->join('users as u', 'leads.user_id', '=', 'u.id')->get();
        }


        return $leads;
    }

    public static function misLeads($startDate, $endDate, $saleStatus, $loggedUser)
    {
        if ($startDate && $endDate && empty($saleStatus)) {
            $leads = Lead::select()
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->where('user_id', $loggedUser)
                ->get();
        } elseif ($startDate && $endDate && $saleStatus > 0) {

            $leads = Lead::select()
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->Where('salestatus', $saleStatus)
                ->where('user_id', $loggedUser)
                ->get();
        } elseif (empty($startDate) && empty($endDate) && !empty($saleStatus)) {
            $leads = Lead::select()
                ->where('salestatus', $saleStatus)
                ->where('user_id', $loggedUser)
                ->get();
        } else {
            $leads = Lead::select()->where('user_id', $loggedUser)->get();
        }

        return $leads;
    }
}
