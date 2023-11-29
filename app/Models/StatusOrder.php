<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\HasMany;

class StatusOrder extends EloquentModel
{
    use HasFactory;

    protected $collection = "status_orders";

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
