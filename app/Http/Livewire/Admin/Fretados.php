<?php

namespace App\Http\Livewire\Admin;

use App\Models\Fretado;
use Livewire\Component;
use App\Exports\FretadosExport;
use App\Imports\FretadosImport;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Fretados extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Fretado $toRemove = null;
    public Fretado $form;

    public $search;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.region' => 'required',
        'form.zipini' => 'required|min:0',
        'form.zipfin' => 'required|min:0',
        'form.wini' => 'required|min:0',
        'form.wfin' => 'required|min:0',
        'form.value' => 'required|min:0',
        'form.deadline' => 'required|min:0',
    ];
    

    public function mount()
    {
  
    }

    public function getFretadosProperty()
    {    
        if($this->search){
            $fretados = Fretado::orderBy('zipini')->where('zipini', '=',  (int)$this->search)->orWhere('wini', '=',  (int)$this->search)->paginate();
        }else{
            $fretados = Fretado::orderBy('zipini')->paginate();
        }  
    
        //dd($ships);
        return $fretados;
    }

    public function new()
    {
        $this->form = new Fretado();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Fretado $fretado)
    {
        $this->toRemove = $fretado;
        $this->confirmationOpened = true;
    }

    public function edit(Fretado $fretado)
    {
        $this->form = $fretado;
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

    public function deleteAll()
    {
        Fretado::truncate();
    }

    public function export()
    {
        return Excel::download(new FretadosExport, 'fretes.xlsx');
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
        Excel::import(new FretadosImport, $this->path);      
        return redirect()->back()->with('importSuccess', 'Importado com Sucesso');;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.fretado.fretados')->layout('layouts.admin');
    }
}
