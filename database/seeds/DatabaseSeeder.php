<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnitsTableSeeder::class);
        $this->call(LabelsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(OriginsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
