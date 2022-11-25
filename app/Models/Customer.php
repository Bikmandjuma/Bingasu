<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    protected $table='customers';
    protected $guarded = array();

    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
