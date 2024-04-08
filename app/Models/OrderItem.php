<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'vendor_order_id',
    ];

    protected $primaryKey = 'order_item_id';

    /**
     * Get the order that owns the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product of the order item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function vendorOrder()
    {
        return $this->belongsTo(VendorOrder::class);
    }
}
