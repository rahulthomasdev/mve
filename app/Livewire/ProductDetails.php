<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{

    public $productId;
    public $product;
    public $plantSizes = [
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
    ];
    public $planters = [
        'growpot' => 'GroPot',
        'krish' => 'Krish',
        'grail' => 'Grail',
        'aurelius' => 'Aurelius',
    ];


    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($productId);
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
