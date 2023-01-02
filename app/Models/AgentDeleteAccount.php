<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDeleteAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'phone',
        'email',
        'image',
        'nationality',
        'password',
    ];
}
