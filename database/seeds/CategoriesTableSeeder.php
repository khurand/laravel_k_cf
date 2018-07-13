<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Viande'
        ]);
        Category::create([
            'name' => 'Légumes'
        ]);
        Category::create([
            'name' => 'Fruits'
        ]);
        Category::create([
            'name' => 'Epices'
        ]);
        Category::create([
            'name' => 'Produits Régionaux'
        ]);
        Category::create([
            'name' => 'Produits Laitiers'
        ]);
        Category::create([
            'name' => 'Fromages'
        ]);
        Category::create([
            'name' => 'Boissons'
        ]);
    }
}
