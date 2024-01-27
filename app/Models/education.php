<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    // Assuming 'portfolio_db' is the connection for the second database
    protected $connection = 'portfolio_db';

    protected $fillable = ['school', 'qualification', 'from', 'to', 'visibility', 'profile_id'];

}