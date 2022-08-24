<?php

namespace App\Classes;

use Exception;
use App\Models\Order;
use Gerencianet\Gerencianet;
use Illuminate\Support\Facades\Log;
use Gerencianet\Exception\GerencianetException;

class GetNotification
{

    public function index()
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
            'timeout' => 30
        ];




        $token = $_POST["notification"];
        //$token = 'debc0eab-a34d-4c1a-8d71-3717ac57b2db';

        $params = [
            'token' => $token
        ];

        try {

            //dd($token);

            $api = new Gerencianet($options);
            $chargeNotification = $api->getNotification($params, []);
            // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.

            //dd($chargeNotification);
            // Veja abaixo como acessar o ID e a String referente ao último status da transação.

            // Conta o tamanho do array data (que armazena o resultado)
            $i = count($chargeNotification["data"]);
            // Pega o último Object chargeStatus
            $ultimoStatus = $chargeNotification["data"][$i - 1];
            // Acessando o array Status
            $status = $ultimoStatus["status"];
            // Obtendo o ID da transação
            $charge_id = $ultimoStatus["identifiers"]["charge_id"];
            // Obtendo a String do status atual
            $statusAtual = $status["current"];



            // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS

            $this->updateChargeBd($statusAtual, $charge_id, $ultimoStatus);


            echo "O id da transação é: " . $charge_id . " seu novo status é: " . $statusAtual;

            //print_r($chargeNotification);
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

    }



    private function updateChargeBd($statusAtual, $charge_id, $ultimoStatus){


        $orders = new Order();


        if($orders->where('payment_code', $charge_id)->exists()){

            $order = $orders->where('payment_code', $charge_id)->first();


            if($statusAtual == 'waiting'){

                $order->status = 'awaiting payment';
                $order->update();

            }else if($statusAtual == 'paid'){

                $order->status = 'payment confirmed';
                $order->update();

            }else if($statusAtual == 'unpaid'){

                $order->status = 'disapproved payment';
                $order->update();

            }else if($statusAtual == 'link'){

                $order->status = 'link';
                $order->update();

            }



        }else{


            Log::channel('gerenciaNet')->info('pedido com charge_id>: '. $charge_id . ' não foi encontrado no banco de dados');


        }





    }






}
