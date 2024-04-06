<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_date',
        'payment_method',
        'amount',
    ];

    /**
     * Get the order that the payment belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
