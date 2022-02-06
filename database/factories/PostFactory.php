<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'owner'=> $faker -> userName(),
        'post_name'=> $faker -> optional() -> word(),
        'time_of_pubblication'=> $faker -> dateTime() ,
        'description'=> $faker -> optional() -> text(),
        'views'=> $faker -> numberBetween(0, 10000),
        'like'=> $faker -> numberBetween(0, 10000),
        'immagine'=> 'https://unsplash.it/300/300?image=',
    ];
});
