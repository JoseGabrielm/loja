<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;


class Clients extends Component
{
    use WithPagination;
    

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Client $toRemove = null;
    public Client $form;

    public $search;
  

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.name' => 'required',
		'form.fantasy' => '',
		'form.is_company' => '',
		'form.doc_ssn' => '',
		'form.doc_country' => '',
		'form.doc_state' => '',
		'form.doc_city' => '',
		'form.birthday' => '',
		'form.is_active' => '',
		'form.news_letter' => '',
		'form.is_verified' => '',
		'form.note' => '',
		'form.user_id' => ''
    ];
    

    public function mount()
    {
  
    }

    public function getClientsProperty()
    {    
        if($this->search){
            $clients = Client::orderBy('name')->where('name', $this->search);
        }else{
            $clients = Client::orderBy('name');
        }    
        //dd($clients);
        return $clients->paginate();
    }

    public function new()
    {
        $this->form = new Client();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Client $client)
    {
        $this->toRemove = $client;
        $this->confirmationOpened = true;
    }

    public function edit(Client $client)
    {
        $this->form = $client;
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
        return view('livewire.admin.client.clients')->layout('layouts.admin');
    }
}
