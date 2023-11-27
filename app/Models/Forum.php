<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\HasMany;

class Forum extends EloquentModel
{
    use HasFactory;

    protected $collection = "forums";

    public function forumConversation(): HasMany
    {
        return $this->hasMany(ForumConversation::class);
    }
}
