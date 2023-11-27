<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\HasMany;

class ProductCategory extends EloquentModel
{
    use HasFactory;

    protected $collection = "product_categories";

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
