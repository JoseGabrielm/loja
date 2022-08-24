<?php

namespace App\Http\Livewire\Admin;

use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StatesExport;
use App\Imports\StatesImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class States extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?State $toRemove = null;
    public State $form;

    public $search;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.name' => 'required',
		'form.initials' => 'required',
        'form.country_id' => 'required',
    ];
    

    public function mount()
    {
  
    }

    public function getStatesProperty()
    {    
        if($this->search){
            $states = State::orderBy('name')->where('name', 'like', '%' . $this->search)->paginate();
        }else{
            $states = State::orderBy('name')->paginate();
        }  
    
        //dd($states);
        return $states;
    }

    public function new()
    {
        $this->form = new State();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (State $state)
    {
        $this->toRemove = $state;
        $this->confirmationOpened = true;
    }

    public function edit(State $state)
    {
        $this->form = $state;
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

    public function export()
    {
        return Excel::download(new StatesExport, 'estados.xlsx');
    }

    public function openModalImport()
    {
        $this->modalImportOpened = true;
    }

    public function import()
    {
        $this->validate(['path'=>'required|mimes:xlsx,xls']);
        $this->modalImportOpened = false;
        //dd($this->path);     
        Excel::import(new StatesImport, $this->path);      
        return redirect()->back()->with('importSuccess', 'Importado com Sucesso');;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.state.states')->layout('layouts.admin');
    }
}
