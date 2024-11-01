<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'code',
        'name',
        'address',
        'phone',
        'email',
        'pic_name'
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
