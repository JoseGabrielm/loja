<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class Categories extends Component
{
    use WithPagination;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Category $toRemove = null;
    public Category $form;

    public $rules = [
        'form.image' => 'url',
        'form.description' => 'required',   
    ];
    

    public function mount()
    {
       //
    }

    public function getCategoriesProperty()
    {      
        return $categories = Category::paginate();
        //dd($categories);
    }

    public function new()
    {
        $this->form = new Category();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove(Category $category)
    {
        $this->toRemove = $category;
        $this->confirmationOpened = true;
    }

    public function edit(Category $category)
    {
        $this->form = $category;
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


    public function render()
    {       
        return view('livewire.admin.category.categories')->layout('layouts.admin');
    }
}
