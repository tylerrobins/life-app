<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionCategory extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionCategoryFactory> */
    use HasFactory;

    /**
     * Gets home that transaction belongs to.
     *
     * @return BelongsTo<Home, TransactionCategory>
     */
    public function home(): BelongsTo
    {
        return $this->belongsTo(Home::class);
    }

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
