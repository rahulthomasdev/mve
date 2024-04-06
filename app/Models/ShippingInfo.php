<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'carrier',
        'tracking_number',
        'estimated_delivery',
    ];

    /**
     * Get the order associated with the shipping info.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
