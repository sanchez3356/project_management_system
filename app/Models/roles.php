<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class roles extends Model
{
    use HasFactory;
    // Assuming 'portfolio_db' is the connection for the second database
    protected $connection = 'portfolio_db';

    /**
     * Get the career record that role belongs to.
     *
     * @return BelongsTo
     */
    public function careers()
    {
        return $this->belongsTo(careers::class);
    }

}