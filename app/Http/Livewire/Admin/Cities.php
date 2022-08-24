<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\CitiesExport;
use App\Imports\CitiesImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Cities extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?City $toRemove = null;
    public City $form;

    public $search;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.name' => 'required',
		'form.code' => 'required',
        'form.state_id' => 'required',
    ];
    

    public function mount()
    {
  
    }

    public function getCitiesProperty()
    {    
        if($this->search){
            $cities = City::orderBy('name')->where('name', 'like', '%' . $this->search . '%')->paginate();
        }else{
            $cities = City::orderBy('name')->paginate();
        }     
        //dd($cities);
        return $cities;
    }

    public function new()
    {
        $this->form = new City();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove (City $city)
    {
        $this->toRemove = $city;
        $this->confirmationOpened = true;
    }

    public function edit(City $city)
    {
        $this->form = $city;
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
        return Excel::download(new CitiesExport, 'cidades.xlsx');
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
        Excel::import(new CitiesImport, $this->path);      
        return redirect()->back()->with('importSuccess', 'Importado com Sucesso');;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.city.cities')->layout('layouts.admin');
    }

}
