<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class project_type extends Model
{
    use HasFactory;

    // Assuming 'portfolio_db' is the connection for the second database
    protected $connection = 'portfolio_db';

    protected $fillable = ['project_type'];
    /**
     * Get the project for the project type record
     *
     * @return BelongsTo
     */

    public function project()
    {
        return $this->belongsTo(project::class, 'project_type');
    }


}