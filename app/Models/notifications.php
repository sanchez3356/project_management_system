<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'notification', 'message', 'type', 'icon', 'read'];

}