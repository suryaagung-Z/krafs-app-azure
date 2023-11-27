<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\BelongsTo;

class Order extends EloquentModel
{
    use HasFactory;

    protected $collection = "orders";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
