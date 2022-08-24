<?php

namespace App\Http\Livewire\Front;

use Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Client;
use App\Models\Address;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderProduct;

use App\Classes\CalculateShipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Classes\CalculateShipOtimized;


class About extends Component
{




    public function render()
    {
        return view('livewire.front.about.about');
    }

}
