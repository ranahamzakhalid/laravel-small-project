<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_ extends Model
{
    use HasFactory;

    protected $table = 'login_';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
