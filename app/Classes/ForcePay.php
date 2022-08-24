<?php

namespace App\Classes;

use Exception;
use Gerencianet\Gerencianet;
use Gerencianet\Exception\GerencianetException;


class ForcePay
 {

public function forcePay($paymentCode){

$options = [
'client_id' => env('GERENCIANET_CLIENT_ID_SANDBOX'),
'client_secret' => env('GERENCIANET_CLIENT_SECRET_SANDBOX'),
'sandbox' => true // altere conforme o ambiente (true = Homologação e false = producao)
];

// $charge_id refere-se ao ID da transação (charge_id) desejado
$params = [
'id' => $paymentCode
];



try {
    $api = new Gerencianet($options);
    $response = $api->settleCharge($params, []);
    if($response['code'] == 200){


        session()->flash('success', 'cobrança foi atualizada para (Marcado como paga)');


    }else{

        if($response['error'] == 'charge_is_not_waiting_nor_unpaid'){

        session()->flash('failure', 'pedido já marcado como pago');

        }else{


        session()->flash('failure', 'erro ' . $response['code'] . ': ' . $response['error']);
    }

    }





} catch (GerencianetException $e) {

    dd($e->code . ' ' .  $e->error . ' ' . $e->errorDescription);

} catch (Exception $e) {
    dd($e->getMessage());
}


}
 }
