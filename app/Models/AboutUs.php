<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable=[
 		'image',
 		'content',
        'property_address',
        'property_owner_phone',
        'property_owner_email',
		'property_long',
        'property_lat',
    ];
}
