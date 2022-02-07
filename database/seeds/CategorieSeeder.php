<?php

use Illuminate\Database\Seeder;
use App\Categorie;
class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Categorie::class, 50) -> create();
    }
}
