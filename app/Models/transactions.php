<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transactions extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * Get the account that the transaction belongs to.
     *
     * @return BelongsTo
     */

    public function accounts()
    {
        return $this->belongsTo(accounts::class);
    }
}