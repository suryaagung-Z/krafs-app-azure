<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\HasMany;

class PaymentMethod extends EloquentModel
{
    use HasFactory;

    protected $collection = "payment_methods";

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
