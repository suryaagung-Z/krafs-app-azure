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

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusOrder::class, 'status_order_id');
    }
}
