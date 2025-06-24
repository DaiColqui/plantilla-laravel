<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $brand_id = '';
    public $search = '';

    protected $updatesQueryString = [
        'brand_id' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingBrandId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $mis_productos = Product::with('brand:id,name')
            ->when(
                $this->brand_id !== '',
                fn($q) =>
                $q->where('brand_id', $this->brand_id)
            )
            ->when(
                $this->search !== '',
                fn($q) =>
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
            )
            ->paginate(6);

        return view('livewire.products', [
            'mis_productos' => $mis_productos,
            'brands' => Brand::orderBy('name')->get(),
        ]);
    }
}
