<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Home extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Gets the users associated with the home.
     *
     * @return HasMany<User, Home>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Gets transactions associated with home
     *
     * @return  HasManyThrough<Transaction, User>
     */
    public function transactions(): HasManyThrough
    {
        return $this->hasManyThrough(Transaction::class, User::class);
    }
}
