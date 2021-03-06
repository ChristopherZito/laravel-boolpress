<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table -> id();

            $table -> string('owner') ;
            $table -> string('post_name') -> nullable();
            $table -> dateTime('time_of_pubblication');
            $table -> text('description') -> nullable();
            $table -> integer('views') -> default(0) ->unsigned();
            $table -> integer('like') -> default(0) ->unsigned();
            $table -> string('immagine')-> default('https://unsplash.it/300/300?image=');

            $table -> bigInteger('categorie_id') -> unsigned();

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
