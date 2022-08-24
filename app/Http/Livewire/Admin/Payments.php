<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Payments extends Component
{

    use WithPagination;
    

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Payment $toRemove = null;
    public Payment $form;

    public $search;
  

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.status' => 'required',
		'form.method' => '',
		'form.base_currency' => '',
		'form.value' => '',
		'form.parcel' => '',
		'form.due_date' => '',
		'form.payment_date' => '',
		'form.note' => '',
		'form.order_id' => ''
    ];
    

    public function mount()
    {
  
    }

    public function getPaymentsProperty()
    {    
        if($this->search){
            $payments = Payment::orderBy('status')->where('status', $this->search);
        }else{
            $payments = Payment::orderBy('status');
        }    
        //dd($clients);
        return $payments->paginate();
    }

    public function new()
    {
        $this->form = new Payment();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Payment $payment)
    {
        $this->toRemove = $payment;
        $this->confirmationOpened = true;
    }

    public function edit(Payment $payment)
    {
        $this->form = $payment;
        //dd($this->form->birthday );
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
        return view('livewire.admin.payment.payments')->layout('layouts.admin');
    }
}
