<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    /**
     * Get the user who owns the wishlist.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
