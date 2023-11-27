<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Product extends EloquentModel
{
    use HasFactory;

    protected $collection = "products";

    protected $guarded = ['_id'];

    protected $fillable = ['name'];

    public function product_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
