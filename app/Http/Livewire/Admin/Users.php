<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Users extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?User $toRemove = null;
    public User $form;
    //public $users;

    public $search;


    public $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'profile_photo_url' => ''
    ];
    

    public function mount()
    {
        
    }

    public function getUsersProperty()
    {      
        $users = User::orderBy('name', 'ASC');
        //dd($users);
        return $users->paginate();
    }

    public function new()
    {
        $this->form = new User();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove(User $user)
    {
        $this->toRemove = $user;
        $this->confirmationOpened = true;
    }

    public function edit(User $user)
    {
        $this->form = $user;
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
        return view('livewire.admin.user.users')->layout('layouts.admin');
    }
}
