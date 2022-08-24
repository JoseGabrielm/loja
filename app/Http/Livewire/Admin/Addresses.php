<?php

namespace App\Http\Livewire\Admin;

use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;


class Addresses extends Component
{

    use WithPagination;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Address $toRemove = null;
    public Address $form;

    public $search;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.type' => 'required',
		'form.postcode' => '',
		'form.address' => '',
		'form.number' => '',
		'form.neighborhood' => '',
		'form.complement' => '',
        'form.client_id' => 'required',
		'form.city_id' => '',
    ];
    

    public function mount()
    {
  
    }

    public function getAddressesProperty()
    {    
        if($this->search){
            $addresses = Address::orderBy('client_id')->where('client_id', '=',  (int)$this->search);
        }else{
            $addresses = Address::orderBy('client_id');
        }  
    
        //dd($addresses);
        return $addresses->paginate();
    }

    public function new()
    {
        $this->form = new Address();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Address $address)
    {
        $this->toRemove = $address;
        $this->confirmationOpened = true;
    }

    public function edit(Address $address)
    {
        $this->form = $address;
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
        return view('livewire.admin.address.addresses')->layout('layouts.admin');
    }
}
