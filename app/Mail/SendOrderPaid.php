<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderPaid extends Mailable
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
        return  $this->from('suporte@supreme.ind.br')
                     ->view('emails.test')
                     ->with([

                        "data" => $this->data

                     ]);
    }
}
