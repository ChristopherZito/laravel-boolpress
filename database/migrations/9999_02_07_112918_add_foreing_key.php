<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table  -> foreign('categorie_id', 'posts_categorie')
                    -> references('id')
                    -> on('categories'); 

        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropForeign('posts_categorie');

        });
    }
}
