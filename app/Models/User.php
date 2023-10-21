<?php

namespace App\Models;

use App\Http\Controllers\AccountsController;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'type',
    ];

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
     * Get the accounts that belong to the user
     *
     * @return HasMany
     */
    public function accounts()
    {
        return $this->hasMany(accounts::class, 'user_id'); // 'user_id' is the foreign key column in the 'accounts' table
    }

    /**
     * Get the budgets that belong to the user
     *
     * @return HasMany
     */

    public function budgets()
    {
        return $this->hasMany(budgets::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->profile->delete();
        });
    }
}