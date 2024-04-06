<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'wishlist_id',
        'product_id',
    ];

    /**
     * Get the wishlist that the item belongs to.
     */
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    /**
     * Get the product of the wishlist item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
