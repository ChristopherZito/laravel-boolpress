<?php

use Illuminate\Database\Seeder;
use App\Categorie;
use App\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50) -> make() -> each(function ($post)
        {
            $categorie = Categorie::inRandomOrder() -> limit(1) -> first();
            $post -> cotegorie() -> associate($categorie);
            $post -> save();
        });
    }
}
