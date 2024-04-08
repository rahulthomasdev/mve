<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_order_id',
        'order_id',
        'vendor_id',
        'vendor_order_no',
        'shipping_address',
        'shipping_method',
        'expected_delivery_date',
        'status',
    ];
    protected $primaryKey = 'vendor_order_id';

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'vendor_order_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
