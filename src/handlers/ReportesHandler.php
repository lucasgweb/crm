<?php

namespace src\handlers;

use src\models\Lead;
use src\models\User;

class ReportesHandler
{
    public static function allReportes($startDate, $endDate, $userId)
    {


        $leads = LeadHandler::all($startDate, $endDate, $userId);

        $count = [
            'pendiente' => 0,
            'noContesta' => 0,
            'confirmara' => 0,
            'noInteresado' => 0,
            'pagara' => 0,
            'competencia' => 0,
            'pagado' => 0,
            'volverLLamar' => 0,
            'masAdelante' => 0,
            'apagado' => 0,
            'otraIntitucion' => 0,
            'suspendida' => 0,
            'contactoTercero' => 0,
            'sinContacto' => 0,
            'numeroEquivocado' => 0,
            'whatsappCorreo' => 0,
            'desiste' => 0,
            'facebookLeads' => 0,
            'whatsapp' => 0,
            'convenio' => 0,
            'tiktok' => 0,
            'paginaWeb' => 0,
            'llamada' => 0,
            'talleres' => 0,
            'referido' => 0,
            'mensajes' => 0,
            'otros' => 0,
            'total' => count($leads),
        ];

        foreach ($leads as $lead) {
            //COUNT STATUS

            if ($lead['salestatus'] == 'Pendiente') {

                $count['pendiente'] =  ++$count['pendiente'];
            }

            if ($lead['salestatus'] == 'No Contesta') {

                $count['noContesta'] =  ++$count['noContesta'];
            }

            if ($lead['salestatus'] == 'Confirmara') {

                $count['confirmara'] =  ++$count['confirmara'];
            }

            if ($lead['salestatus'] == 'No Interesado/a') {

                $count['noInteresado'] =  ++$count['noInteresado'];
            }

            if ($lead['salestatus'] == 'Pagará') {

                $count['pagara'] =  ++$count['pagara'];
            }

            if ($lead['salestatus'] == 'Competencia') {

                $count['competencia'] =  ++$count['competencia'];
            }

            if ($lead['salestatus'] == 'Pagado') {

                $count['pagado'] =  ++$count['pagado'];
            }

            if ($lead['salestatus'] == 'Volver a Llamar') {

                $count['volverLlamar'] =  ++$count['volverLlamar'];
            }

            if ($lead['salestatus'] == 'Mas adelante / Economia') {

                $count['masAdelante'] =  ++$count['masAdelante'];
            }

            if ($lead['salestatus'] == 'Otra Institución') {

                $count['otraIntitucion'] =  ++$count['apagado'];
            }

            if ($lead['salestatus'] == 'Apagado/Ocupado') {

                $count['apagado'] =  ++$count['apagado'];
            }

            if ($lead['salestatus'] == 'Suspendida') {

                $count['suspendida'] =  ++$count['suspendida'];
            }

            if ($lead['salestatus'] == 'Contacto con Tercero') {

                $count['contactoTercero'] =  ++$count['contactoTercero'];
            }

            if ($lead['salestatus'] == 'Sin Contacto') {

                $count['sinContacto'] =  ++$count['sinContacto'];
            }

            if ($lead['salestatus'] == 'Numero equivocado / No Aplica') {

                $count['numeroEquivocado'] =  ++$count['numeroEquivocado'];
            }

            if ($lead['salestatus'] == 'WhatsApp / Correo') {

                $count['whatsappCorreo'] =  ++$count['whatsappCorreo'];
            }

            if ($lead['salestatus'] == 'Desiste') {

                $count['desiste'] =  ++$count['pendiente'];
            }
        }

        foreach ($leads as $lead) {
            //COUNT CHANNELS

            if ($lead['channel'] == 'Facebook - Leads') {

                $count['facebookLeads'] =  ++$count['facebookLeads'];
            }

            if ($lead['channel'] == 'Whatsapp directo') {

                $count['whatsapp'] =  ++$count['whatsapp'];
            }

            if ($lead['channel'] == 'Convenio') {

                $count['convenio'] =  ++$count['convenio'];
            }

            if ($lead['channel'] == 'TikTok') {

                $count['tiktok'] =  ++$count['tiktok'];
            }

            if ($lead['channel'] == 'Pagina Web') {

                $count['paginaWeb'] =  ++$count['paginaWeb'];
            }

            if ($lead['channel'] == 'Llamada Directa') {

                $count['llamada'] =  ++$count['llamada'];
            }

            if ($lead['channel'] == 'Talleres') {

                $count['talleres'] =  ++$count['talleres'];
            }

            if ($lead['channel'] == 'Referido') {

                $count['referido'] =  ++$count['referido'];
            }
            if ($lead['channel'] == 'Mensajes') {

                $count['mensajes'] =  ++$count['mensajes'];
            }
            if ($lead['channel'] == 'Otros') {

                $count['otros'] =  ++$count['otros'];
            }
        }

        return $count;
    }

    public static function reporteVendedor($startDate, $endDate)
    {
        if ($startDate && $endDate) {

            $leads = Lead::select()
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->where('salestatus', 'Pagado')
                ->get();
        } else {

            $leads = Lead::select()->where('salestatus', 'Pagado')
            ->get();
        }

        $users = User::select()->where('level', 3)->where('status', 1)->get();

        $data = [];
        $count = [];
        $total = 0;
        foreach ($users as $user) {
            $user['totalSales'] = 0;

            foreach ($leads as $lead) {
                if ($lead['user_id'] == $user['id']) {
                    $user['totalSales'] = ++$user['totalSales'];
                    $total = ++$total;
                }
            }

            $count[] = $user;
        }

        $data = [
            'count' => $count,
            'total' => $total
        ];
        return $data;
    }
}
