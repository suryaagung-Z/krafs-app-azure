<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;
use Illuminate\Contracts\Auth\Authenticatable;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class User extends EloquentModel implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $collection = "users";

    protected $guarded = ['_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function forumConversation(): HasMany
    {
        return $this->hasMany(ForumConversation::class);
    }

    public function botConversation(): HasMany
    {
        return $this->hasMany(BotConversation::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}


// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//     ];

//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
// }
