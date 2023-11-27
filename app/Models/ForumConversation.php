<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use MongoDB\Laravel\Relations\BelongsTo;

class ForumConversation extends EloquentModel
{
    use HasFactory;

    protected $collection = "forum_conversations";

    protected $fillable = ['user_id', 'forum_id'];

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
