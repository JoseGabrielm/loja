<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Shoppings extends Component
{

    public $order;
    public $orders;
    public $details;
    public $client;

    public function mount() {
        $user = auth()->user();
        $this->client = $user->client->where('user_id', $user->id)->first();
        $this->orders = $this->client->orders()->where('client_id', $this->client->id)->with('order_products')->orderBy('id', 'desc')->get();
        //$this->order = $this->client->orders()->orderBy('id', 'desc')->first();
    }

    public function redirectCheckout($orderId)
    {
        //dd($order);
        return redirect()->route('front.checkout', ['order_id' => $orderId]);
    }



    public function render()
    {
        return view('livewire.front.shopping.shoppings');
    }
}
