<?php

namespace App\Http\Livewire\Admin;

use Exception;

use App\Models\Order;
use Livewire\Component;
use App\Classes\ForcePay;
use Gerencianet\Gerencianet;
use Livewire\WithPagination;
use App\Http\Relatorios\PrintOrder;
use Gerencianet\Exception\GerencianetException;


class Orders extends Component
{

    use WithPagination;

    public $filter;
    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Order $toRemove = null;
    public Order $form;

    public $search;


    public $rules = [
        'form.id' => '',
        'form.status' => 'required',
		'form.base_currency' => 'required',
        'form.ship_value' => 'required|min:0',
		'form.ship_form' => 'required',
        'form.doc_number' => 'required',
		'form.coupon_code' => 'required',
        'form.discount' => 'required|min:0',
        'form.sub_total' => 'required|min:0',
		'form.grand_total' => 'required|min:0',
        'form.client_id' => 'required',
        'form.url_pay' =>   '',
    ];


    public function getOrdersProperty()
    {
        if($this->search){
            $orders = Order::orderBy('id')->where('status', 'like', '%' . $this->search . '%')->paginate();
        }else{
            $orders = Order::orderBy('id', 'desc')->paginate();
        }
        //dd($cities);
        return $orders;
    }

    public function new()
    {
        $this->form = new Order();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Order $order)
    {
        $this->toRemove = $order;
        $this->confirmationOpened = true;
    }

    public function edit(Order $order)
    {
        $this->form = $order;
        //dd($this->form->url_pay);
        $this->formModalOpened = true;
        $this->clearValidation();
    }


    public function save()
    {
        $this->Validate();
        //dd($this->form->toArray());
        $this->form->save();
        $this->formModalOpened = false;
        $this->clearValidation();
    }

    public function remove()
    {
        $this->toRemove->delete();
        $this->confirmationOpened=false;
    }



    public function forcePay(){


        $paymentCode = $this->form->payment_code;
        intval($paymentCode);
        $forcePay = new ForcePay();
        $response = $forcePay->forcePay($paymentCode);

    }



    public function importPedidos(){


        return redirect()->route('import');



    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.order.orders')->layout('layouts.admin');
    }
}
