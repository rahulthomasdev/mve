<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id'
    ];

    protected $primaryKey = 'category_id';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
