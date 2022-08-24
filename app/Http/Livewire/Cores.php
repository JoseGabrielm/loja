<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cores extends Component
{


    public function render()
    {
        session()->flash('alert', 'Cores escolhidas por mim, não diga que não gosta');

        return view('livewire.cores');
    }
}
