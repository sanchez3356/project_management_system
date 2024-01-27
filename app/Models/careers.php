<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class careers extends Model
{
    use HasFactory;
    // Assuming 'portfolio_db' is the connection for the second database
    protected $connection = 'portfolio_db';

    protected $fillable = ['job_title', 'company', 'location', 'from', 'to', 'visibility', 'profile_id'];

    /**
     * Get the roles for the careers record
     *
     * @return HasMany
     */

    public function roles()
    {
        return $this->hasMany(roles::class, 'career_id');
    }
}