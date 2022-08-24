<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Contacts extends Component
{
    public $active = false;

    public function render()
    {
        if (Auth::user()) {
            return view('livewire.front.contact.contacts')->layout('layouts.app');
        } else {
            return view('livewire.front.contact.contacts')->layout('layouts.front');
        }
    }
    
}
