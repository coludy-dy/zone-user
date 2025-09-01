<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $connection='mysql2';

    // protected $fillable = [
    //     'name'
    // ];

    // public function products(): HasMany
    // {
    //     return $this->hasMany(Product::class, 'brand_id', 'id');
    // }
}
