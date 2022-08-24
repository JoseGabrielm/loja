<?php

namespace App\Http\Livewire\Front;

use App\Models\Group;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Shops extends Component
{

    public $cat = 'todos';
    public $scrollPage = 3;
    public $modalStoresOpen = false;

    protected $listeners = ['openStores'];





    public function getShopsProperty()
    {
        $shops = Group::with('images', 'products')->where('active', 1)->orderBy('order')
        ->when($this->cat != 'todos', function($queryBuilder) { return $queryBuilder->where('category_id', $this->cat); });
        //dd($shops);
        return $shops->get();




    }



    public function scrollLoadMore()
    {
       $this->scrollPage += $this->scrollPage;
    }


 public function openStores ()
    {

        $this->modalStoresOpen = true;
    }


    public function redirectDetail($slug)
    {
        //dd($slug);
        return redirect()->route('front.detail', ['slug' => $slug]);
    }


    public function render()
    {


            return view('livewire.front.shop.shops')->layout('layouts.app');


    }
}
