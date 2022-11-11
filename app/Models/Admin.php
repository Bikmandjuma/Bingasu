<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    protected $table='admins';
    protected $guarded = array();

    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'phone',
        'email',
        'nationality',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
