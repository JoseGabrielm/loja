<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Exports\GroupsExport;
use App\Imports\GroupsImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Groups extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $formModalMeasuresOpened = false;
    public $formModalDescriptionOpened = false;
    public $confirmationOpened = false;
    public ?Group $toRemove = null;
    public Group $form;
    public $categories;

    public $search;
    public $active;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.sku' => 'required',
        'form.name' => 'required',
        'form.slug' => '',
        'form.qty_ship' => 'required|numeric|integer|min:0',
        'form.active' => '',
        'form.order' => 'required|min:0',
        'form.packing_format' => '',
        'form.grossweight' => '',
        'form.netweight' => '',
        'form.packing_length' => '',
        'form.packing_width' => '',
        'form.packing_height' => '',
        'form.product_length' => '',
        'form.product_width' => '',
        'form.product_height' => '|',
        'form.description' => '',
        'form.description_short' => '',
        'form.description_long' => '',
        'form.technical_features' => '', 
        'form.seller_id' => '', 
        'form.category_id' => ''
    ];
    

    public function mount()
    {
        $this->categories = Category::get(); 
        //dd($this->categories);
    }

    public function getGroupsProperty()
    {      
    $groups = Group::with('categories', 'images')->when($this->search, function($queryBuilder) 
            { return  $queryBuilder->where(function($queryBuilder)
                {
                    $queryBuilder->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('sku', 'like', $this->search . '%') ;
                });             
            });
        $groups->when($this->active == 'ativado', function($queryBuilder) { return $queryBuilder->where('active', 1); });
        //dd($groups);
        
        return $groups->paginate();
    }

    public function new()
    {
        $this->form = new Group();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove(Group $group)
    {
        $this->toRemove = $group;
        $this->confirmationOpened = true;
    }

    public function edit(Group $group)
    {
        $this->form = $group;
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function editMeasures(Group $group)
    {
        $this->form = $group;
        $this->formModalMeasuresOpened = true;
        $this->clearValidation();
    }

    public function editDescriptions(Group $group)
    {
        $this->form = $group;
        $this->formModalDescriptionOpened = true;
        $this->clearValidation();
    }


    public function save()
    {
        $this->Validate();
        //dd($this->form->toArray());
        $this->form->save();
        $this->formModalOpened = false;
        $this->formModalMeasuresOpened = false;
        $this->formModalDescriptionOpened = false;
        $this->clearValidation();
    }

    public function remove()
    {
        $this->toRemove->delete();
        $this->confirmationOpened=false;
    }

    public function export()
    {
        return Excel::download(new GroupsExport, 'groups.xlsx');
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
        Excel::import(new GroupsImport, $this->path);      
        return redirect()->back()->with('importSuccess', 'Importado com Sucesso');;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingActive()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.group.groups')->layout('layouts.admin');
    }
}
