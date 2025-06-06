<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets all transactions related to this category
     *
     * @return HasMany<Transaction, TransactionCategory>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
