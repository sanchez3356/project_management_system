<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'username', 'avatar', 'created_by', 'password'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the profile account associate with the client
     *
     * @return MorphOne
     */
    public function profiles()
    {
        return $this->morphOne(profiles::class, 'profileable');
    }
        /**
     * Get the projecvts that belong to the client
     *
     * @return HasMany
     */

     public function projects()
     {
         return $this->hasMany(projects::class, 'client_id'); // 'client_id' is the foreign key column in the 'projects' table
     }
 
        protected static function boot()
    {
        parent::boot();

        static::deleting(function ($client) {
            $client->profile->delete();
        });
    }
}