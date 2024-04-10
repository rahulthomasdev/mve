<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'category_id',
        'name',
        'description',
        'price',
        'quantity',
        'images',
        'highlight'
    ];

    protected $casts = [
        'images' => 'array',
        'highlight' => 'array',
    ];

    /**
     * Get the vendor that owns the product.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Get the category of the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class,  'category_id', 'category_id');
    }
}
