<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Images extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Image $toRemove = null;
    public Image $form;
    public $groups;

    public $search;
    public $active;


    public $rules = [
        'form.path' => 'required',
        'form.description' => '',
        'form.type' => '',
        'form.group_id' => '',
    ];
    

    public function mount()
    {
        $this->groups = Group::orderBy('sku')->get(); 
        //dd($this->groups);
    }

    public function getImagesProperty()
    {      
        $images = Image::with('group')->where('group_id', 'like', '%' . $this->search . '%'); 
        //dd($images->first()->group->sku);            
        return $images->paginate();
    }

    public function new()
    {
        $this->form = new Image();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove(Image $image)
    {
        $this->toRemove = $image;
        $this->confirmationOpened = true;
    }

    public function edit(Image $image)
    {
        $this->form = $image;
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
        return view('livewire.admin.image.images')->layout('layouts.admin');
    }
}
