<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSocialMedia extends Model
{
    use HasFactory;
    
    protected $fillable=[
    	'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'whatsapp',
        'twitter',
        'linkdin',
    ];
}
