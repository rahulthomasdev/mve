<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSection extends Component
{
    public $title;
    public $highlight;

    public $products;

    public function mount()
    {
        $this->products = Product::whereJsonContains('highlight', $this->highlight)->get();
    }

    public function render()
    {
        return view('livewire.product-section');
    }
}
