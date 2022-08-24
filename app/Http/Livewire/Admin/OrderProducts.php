<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\OrderProduct;
use Livewire\WithPagination;


class OrderProducts extends Component
{

    use WithPagination;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?OrderProduct $toRemove = null;
    public OrderProduct $form;

    public $search;


    public $rules = [
        'form.product_description' => 'required',
		'form.ship_form' => 'required',
        'form.base_currency' => 'required',
        'form.unitary_price' => 'required|min:0',
		'form.amount' => 'required|min:0',
        'form.ship_value' => 'required|min:0',
        'form.base_total' => 'required|min:0',
		'form.total' => 'required|min:0',
        'form.discount_percent' => 'required|min:0',
        'form.discount_amount' => 'required|min:0',
		'form.grand_total' => 'required|min:0',
        'form.additional' => 'required',
        'form.order_id' => 'required',
        'form.product_id' => 'required',
    ];
    

    public function mount()
    {
  
    }

    public function getOrderProductsProperty()
    {    
        if($this->search){
            $orders = OrderProduct::orderBy('id')->where('product_description', 'like', '%' . $this->search . '%')->paginate();
        }else{
            $orders = OrderProduct::orderBy('id', 'desc')->paginate();
        }     
        //dd($cities);
        return $orders;
    }

    public function new()
    {
        $this->form = new OrderProduct();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (OrderProduct $orderProduct)
    {
        $this->toRemove = $orderProduct;
        $this->confirmationOpened = true;
    }

    public function edit(OrderProduct $orderProduct)
    {
        $this->form = $orderProduct;
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


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.order_product.order-products')->layout('layouts.admin');
    }
}
