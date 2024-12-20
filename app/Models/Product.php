<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{



    protected $fillable = [
        'code',
        'name',
        'category_id',
        'description',
        'minimum_stock',
        'price',
        'unit'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');  // Menyebutkan nama kolom 'category_id'
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'customer_product', 'product_id', 'customer_id');
    }
}
