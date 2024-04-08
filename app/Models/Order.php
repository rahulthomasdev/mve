<?php

namespace App\Models;

use App\Utils\OrderUtility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
        'shipping_address',
        'total_amount',
    ];

    /**
     * Get the customer that placed the order.
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    public function vendorOrders()
    {
        return $this->hasMany(VendorOrder::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->order_no) {
                $user->order_no = OrderUtility::class::generateUniqueOrderNumber('MVE-');
            }
        });
    }
}
