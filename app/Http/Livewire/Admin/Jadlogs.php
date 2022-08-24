<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jadlog;
use Livewire\Component;
use App\Exports\JadlogsExport;
use App\Imports\JadlogsImport;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Jadlogs extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Jadlog $toRemove = null;
    public Jadlog $form;

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

    public function getJadlogsProperty()
    {    
        if($this->search){
            $jadlogs = Jadlog::orderBy('zipini')->where('zipini', '=',  (int)$this->search)->orWhere('wini', '=',  (int)$this->search)->paginate();
        }else{
            $jadlogs = Jadlog::orderBy('zipini')->paginate();
        }  
    
        //dd($ships);
        return $jadlogs;
    }

    public function new()
    {
        $this->form = new Jadlog();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (Jadlog $jadlog)
    {
        $this->toRemove = $jadlog;
        $this->confirmationOpened = true;
    }

    public function edit(Jadlog $jadlog)
    {
        $this->form = $jadlog;
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
        Jadlog::truncate();
    }

    public function export()
    {
        ini_set('memory_limit','1024');            
        set_time_limit(1200000);                       
        return Excel::download(new JadlogsExport, 'fretes.xlsx');
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
        ini_set('memory_limit','-1');            
        set_time_limit(1200000);       
        Excel::import(new JadlogsImport, $this->path);      
        return redirect()->back()->with('importSuccess', 'Importado com Sucesso');;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.jadlog.jadlogs')->layout('layouts.admin');
    }
}
