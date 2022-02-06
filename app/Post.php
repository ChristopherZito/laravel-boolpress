<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'owner',
        'post_name',
        'time_of_pubblication',
        'description',
        'views',
        'like',
        'immagine',

    ];
}
