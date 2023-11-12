<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class projects extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_title',
        'project_type',
        'created_by',
        'client_id',
        'start_date',
        'end_date',
        'project_image',
        'project_description',
        'priority',
        'rate'
    ];

    /**
     * Get the phases for the project
     *
     * @return HasMany
     */
    public function phases()
    {
        return $this->hasMany(phases::class);
    }
    /**
     * Get the client that the project belongs to.
     *
     * @return BelongsTo
     */

     public function clients()
     {
         return $this->belongsTo(clients::class, 'client_id');
     }
     
}