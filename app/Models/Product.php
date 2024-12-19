<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function customer(): BelongsTo
{
    return $this->belongsTo(Customer::class, 'customer_id');  // Menyebutkan nama kolom
}
}
