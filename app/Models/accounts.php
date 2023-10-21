<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class accounts extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'account_name', 'initial_balance', 'final_balance'];

    /**
     * Get the accounts that belong to the user
     *
     * @return BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the transactions that belong to the account
     *
     * @return HasMany
     */

    public function transactions()
    {
        return $this->hasMany(transactions::class, 'account_id'); // 'account_id' is the foreign key column in the 'transactions' table
    }

}