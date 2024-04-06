<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_percentage',
        'expiry_date',
        'use_limit',
        'vendor_id',
    ];
    protected $primaryKey = 'coupon_id';

    public function vendor()
    {
        return  $this->belongsTo(Vendor::class);
    }
}
