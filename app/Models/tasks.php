<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'task',
        'description',
        'phase_id',
        'order',
        'order',
        'image',
        'file',
        'deadline',
        'status'
    ];
    /**
     * Get the phase that task belongs to.
     *
     * @return BelongsTo
     */
    public function phases()
    {
        return $this->belongsTo(phases::class);
    }
}