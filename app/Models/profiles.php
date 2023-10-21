<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'photo', 'first_name', 'last_name', 'phone', 'address'];

    public function profileable()
{
    return $this->morphTo();
}


}