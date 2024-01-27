<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class project extends Model
{
    use HasFactory;
    // Assuming 'portfolio_db' is the connection for the second database
    protected $connection = 'portfolio_db';

    protected $fillable = ['project_name', 'image', 'description', 'project_type'];

}