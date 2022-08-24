<?php

namespace App\Classes;


use Exception;
use Gerencianet\Gerencianet;
use Illuminate\Support\Facades\Log;
use Gerencianet\Exception\GerencianetException;

class CreatePayBillet
{

    public function index($order, $client, $details)
    {

        if(config('gerencianet.sandbox') == TRUE ){
            // Ambiente desenvolvimento
            $clientId = config('gerencianet.clientIdSandbox');
            $clientSecret = config('gerencianet.clientSecretSandbox');
        }else{
            // Ambiente produção
            $clientId = config('gerencianet.clientIdProd');
            $clientSecret = config('gerencianet.clientSecretProd');
        }


        $options = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'sandbox' => config('gerencianet.sandbox'),
            'debug' => config('gerencianet.debug'),
            'timeout' => 50
        ];

        $items = [];
            foreach ($details as $produto) {
                $item = [
                    'name' => $produto->product_description,
                    'amount' => $produto->amount,
                    'value' => $produto->unitary_price
                ];
                array_push($items, $item);
            }

        $metadata = array('notification_url' => 'https://supreme.ind.br/loja/public/api/notification'); //Url de notificações

        $tel = $client->fantasy;
        //dd($tel);
        $doc = preg_replace('/[^0-9]/', '', $client->doc_ssn);

        if ($client->is_company == TRUE) {
            $doc_country = preg_replace('/[^0-9]/', '', $client->doc_country);
            $juridical_person = [
                'corporate_name' => $client->name, // nome da empresa
                'cnpj' => $doc_country

            ];

            $customer = [
                'phone_number' => $tel, // telefone do cliente - 5144916523
                'juridical_person' => $juridical_person
                     // cnpj válido da empresa - 0427156465000185
            ];

        }else{


            $customer = [
                'name' => utf8_encode($client->name), // nome do cliente - Gorbadoc Oldbuck
                'cpf' => $doc, // cpf válido do cliente - 94271564656
                'phone_number' => preg_replace('/[^0-9]/', '', $tel), // telefone do cliente - 5144916523
            ];
        }

        $discount = [ // configuração de descontos
            'type' => 'currency', // tipo de desconto a ser aplicado
            'value' => $order->discount // valor de desconto
        ];

        //dd($order->discount);


        $shippings = [
            [
                'name' => 'Frete',   //forma de entrega
                'value' => $order->ship_value   //inteiro = valor do frete * 100
            ]
        ];






        //dd($order->ship_value - $order->discount);
        $today = date('Y-m-d');
        $date3 = date('Y-m-d', strtotime($today. ' + 3 days'));
        $bankingBillet = [
            'expire_at' => $date3, // data de vencimento do titulo
            'message' => 'Depois do vencimento este boleto será cancelado\nCaso deseje alterar entre em contato conosco', // mensagem a ser exibida no boleto
            'customer' => $customer,
            'discount' => $discount
        ];
        $payment = [
            'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
        ];
        //dd($bankingBillet);
        $body = [
            'items' => $items,
            'shippings' => $shippings,
            'metadata' =>$metadata,
            'payment' => $payment
        ];




        try {
            $api = new Gerencianet($options);
            $pay_charge = $api->oneStep([],$body);


            if (isset($pay_charge['data'])) {
                return $pay_charge;
            }


            $error = ($pay_charge);
            //session()->flash('message',$message);

            return $error;

            Log::channel('gerenciaNet')->info('Pedido: ' . $order->id . ' > ' .  json_encode($error));




            //return redirect()->away($pay_charge['data']['link']);
        } catch (GerencianetException $e) {

                //print_r($e->code);
                //print_r($e->error);
               $error = $e->errorDescription;
               Log::channel('gerenciaNet')->info('Pedido: ' . $order->id . ' > ' . json_encode($error));



        } catch (Exception $e) {

           $error = $e->getMessage();
           Log::channel('gerenciaNet')->info('Pedido: ' . $order->id . ' > ' .  json_encode($error));

        }

    }



}




