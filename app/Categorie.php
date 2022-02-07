<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'Title',

    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
