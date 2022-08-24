<?php

namespace App\Classes;

use Exception;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use Illuminate\Support\Facades\Log;

class CreatePayCard
{

    public function index($order, $details)
    {

        if (config('gerencianet.sandbox') == true) {
            // Ambiente desenvolvimento
            $clientId = config('gerencianet.clientIdSandbox');
            $clientSecret = config('gerencianet.clientSecretSandbox');
        } else {
            // Ambiente produção
            $clientId = config('gerencianet.clientIdProd');
            $clientSecret = config('gerencianet.clientSecretProd');
        }

        $options = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'sandbox' => config('gerencianet.sandbox'),
            'debug' => config('gerencianet.debug'),
            'timeout' => 50,
        ];

        $items = [];
        foreach ($details as $produto) {
            $item = [
                'name' => $produto->product_description,
                'amount' => $produto->amount,
                'value' => $produto->unitary_price,
            ];
            array_push($items, $item);
        }



        $shippings = [
            [
                'name' => 'Frete', //forma de entrega
                'value' => abs(($order->ship_value - $order->discount)), //inteiro = valor do frete * 100
            ],
        ];




        $metadata = array('notification_url' => 'https://supreme.ind.br/loja/public/api/notification'); //Url de notificações

        $body = [
            'items' => $items,
            'shippings' => $shippings,
            'metadata' => $metadata,

        ];

        try {

            //vai verificar se o pedido ja teve seu link gerado
            if($order->payby == 'link' && $order->status == 'link' ){
                if ($order->url_pay && $order->payment_code && $order->status !== 'payment confirmed') {


                    //dd('link foi gerado e ainda pode ser atualizado');

                    $chargeId = $order->payment_code;
                    $response = $this->updateLink($chargeId, $options);
                    return $response;
                    //dd($response);


                }else{


                    session()->flash('error', 'Seu pagamento já foi processado e confirmado, não podendo ser atualizado. Favor entrar em contato com nossa equipe caso tenha alguma duvida.');


                }

            } else {

                //dd('não foi gerado');

                $api = new Gerencianet($options);
                $response = $api->createCharge([], $body);

                $chargeId = $response['data']['charge_id'];
                $response = $this->paymentLink($chargeId, $options);

                return $response;

            }



        } catch (GerencianetException $e) {

            $error = $e->errorDescription;
            Log::channel('gerenciaNet')->info('Pedido: ' . $order->id . ' > ' . json_encode($error));

        } catch (Exception $e) {

            $error = $e->getMessage();
            Log::channel('gerenciaNet')->info('Pedido: ' . $order->id . ' > ' . json_encode($error));

        }

    }




    private function paymentLink($chargeId, $options)
    {

        $params = [
            'id' => $chargeId,
        ];

        $today = date('Y-m-d');
        $date3 = date('Y-m-d', strtotime($today . ' + 1 days'));

        $body = [
            'message' => '', // mensagem para o pagador com até 80 caracteres
            'expire_at' => $date3, // data de vencimento da tela de pagamento e do próprio boleto
            'request_delivery_address' => false, // solicitar endereço de entrega do comprador?
            'payment_method' => 'credit_card', // formas de pagamento disponíveis
        ];

        try {
            $api = new Gerencianet($options);
            $response = $api->chargeLink($params, $body);

            return $response;

        } catch (GerencianetException $e) {

            $error = $e->code . ' ' . $e->error . ' ' . $e->errorDescription;
            return $error;

        } catch (Exception $e) {

            $error = $e->getMessage();
            return $error;
        }

    }






    private function updateLink($chargeId, $options)
    {

        $params = [
            'id' => $chargeId,
        ];

        $today = date('Y-m-d');
        $date3 = date('Y-m-d', strtotime($today . ' + 1 days'));

        $body = [
            'message' => '', // mensagem para o pagador com até 80 caracteres
            'expire_at' => $date3, // data de vencimento da tela de pagamento e do próprio boleto
            'request_delivery_address' => false, // solicitar endereço de entrega do comprador?
            'payment_method' => 'credit_card', // formas de pagamento disponíveis
        ];

        try {
            $api = new Gerencianet($options);
            $response = $api->updateChargeLink($params, $body);

            return $response;

        } catch (GerencianetException $e) {

            $error = $e->code . ' ' . $e->error . ' ' . $e->errorDescription;
            return $error;

        } catch (Exception $e) {

            $error = $e->getMessage();
            return $error;
        }

    }

}
