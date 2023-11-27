<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasOne;

class Customer extends EloquentModel
{
    use HasFactory;

    protected $collection = "customers";

    protected $guarded = ['_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function AccountActivation(): HasOne
    {
        return $this->hasOne(AccountActivation::class);
    }
}
