<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class profiles extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'photo', 'first_name', 'last_name', 'phone', 'address', 'profileable_type', 'profileable_id'];



}