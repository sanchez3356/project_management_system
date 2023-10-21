<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class phases extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', 'phase', 'start_date', 'end_date', 'status'];
    /**
     * Get the phase that project belongs to.
     *
     * @return BelongsTo
     */
    public function projects()
    {
        return $this->belongsTo(projects::class);
    }
    /**
     * Get the tasks that belong to the phase
     *
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(tasks::class);
    }
}