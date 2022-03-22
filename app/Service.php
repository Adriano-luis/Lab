<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'image_alt',
        'image_title',
        'phone'
    ];
}
