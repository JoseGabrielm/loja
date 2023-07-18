<?php
namespace App\Classes\MailHelpers;

use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;

class HelperMail
{

/* public function build()
{

$to = $this->client->email;

} */

    public static function fetchData(Order $order)
    {
        try {




            $email = HelperMail::getEmail($order);

            $data = [

                "idOrder" => $order->id,
                "recepient" => $email,
                "billet_link" => $order->payby == 'billet' ? $order->url_pay : null,

            ];

            //dd($data);

            return $data;


        } catch (Exception $e) {

            $error = [

                "code" => $e->getCode(),
                "msg" => $e->getMessage()

            ];

            return $error;

        }



    }


    private static function getEmail($order){


        $email = null;

        $contactEmail = Contact::where('client_id', $order->client->id)
        ->where('type', 'email');


        if(!$contactEmail->exists()) {

            $userEmail = User::where('id', $order->client->user_id)
                               ->get('email')
                               ->first();

            $email = $userEmail->email;

        }else{

            $email = $contactEmail->get('description')
                                  ->first();

        }




      return $email;

    }


}
