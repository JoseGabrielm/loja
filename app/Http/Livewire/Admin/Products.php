<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExportSelect;


class Products extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ?Product $toRemove = null;
    public Product $form;
    public $groups;

    public $search;
    public $active;

    public $modalImportOpened = false;
    public $path;


    public $rules = [
        'form.image' => 'required',
        'form.sku' => 'required',
        'form.name' => 'required',
        'form.order' => 'required',
        'form.color' => 'required',
        'form.slug' => '',
        'form.price' => ['required', 'min:0'],
        'form.price_max' => 'required|min:0',
        'form.stock' => 'required|min:0',
        'form.active' => '',
        'form.base_currency' => '',
        'form.group_id' => '',
    ];


    public function mount()
    {
        $this->groups = Group::orderBy('sku')->get();
        //dd($this->groups);
    }

    public function getProductsProperty()
    {
        $products = Product::with('group')->when($this->search, function($queryBuilder)
            { return  $queryBuilder->where(function($queryBuilder)
                {
                    $queryBuilder->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('sku', 'like', $this->search . '%') ;
                });
            });
        $products->when($this->active == 'ativado', function($queryBuilder) { return $queryBuilder->where('active', 1); });
        return $products->paginate();
    }

    public function new()
    {
        $this->form = new Product();
        $this->formModalOpened = true;
        $this->clearValidation();
    }

    public function confirmRemove(Product $product)
    {
        $this->toRemove = $product;
        $this->confirmationOpened = true;
    }

    public function edit(Product $product)
    {
        $this->form = $product;
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
        return Excel::download(new ProductsExport, 'products.xlsx');
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
        Excel::import(new ProductsImport, $this->path);
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
        return view('livewire.admin.product.products')->layout('layouts.admin');
    }


}
