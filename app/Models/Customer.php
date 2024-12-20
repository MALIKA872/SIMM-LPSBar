<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    protected $fillable = [
        'code',
        'name',
        'address',
        'phone',
        'email'
    ];



    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'customer_product', 'customer_id', 'product_id');
    }
}
