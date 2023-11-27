<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

class Cart extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $collection = "carts";

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    protected $casts  = [
        "quantity" => "integer"
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
