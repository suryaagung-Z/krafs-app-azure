<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\BelongsTo;

class AccountActivation extends EloquentModel
{
    use HasFactory;

    protected $collection = "account_activations";

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
