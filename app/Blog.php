<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'image_alt',
        'image_title',
        'text',
        'author'
    ];
}
