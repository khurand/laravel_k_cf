<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Aucun'
        ]);

        Tag::create([
            'name' => 'Bio'
        ]);

        Tag::create([
            'name' => 'Hallal'
        ]);

        Tag::create([
            'name' => 'Raclette'
        ]);

        Tag::create([
            'name' => 'Apero'
        ]);

        Tag::create([
            'name' => 'Paniers'
        ]);

        Tag::create([
            'name' => 'Brunch'
        ]);

        Tag::create([
            'name' => 'Sans Gluten'
        ]);
    }
}
