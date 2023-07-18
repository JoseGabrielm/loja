<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderPlaced extends Mailable
{
    use Queueable, SerializesModels;


    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        try{

            return $this->from('suporte@supreme.ind.br')
                        ->subject('Pedido enviado!')
                        ->view('emails.test')
                        ->with([

                            "data" => $this->data,

                        ]);

        }catch(Exception $e){


            dd($e);


        }


    }
}
