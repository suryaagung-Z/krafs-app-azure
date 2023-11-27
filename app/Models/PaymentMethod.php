<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class PaymentMethod extends EloquentModel
{
    use HasFactory;

    protected $collection = "payment_methods";
}
