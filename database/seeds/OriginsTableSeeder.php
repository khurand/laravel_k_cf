<?php

use Illuminate\Database\Seeder;
use App\Origin;

class OriginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Origin::create([
            'name' => 'Angleterre'
        ]);

        Origin::create([
            'name' => 'Ariège'
        ]);

        Origin::create([
            'name' => 'Auvergne'
        ]);

        Origin::create([
            'name' => 'Aveyron'
        ]);

        Origin::create([
            'name' => 'Berry'
        ]);

        Origin::create([
            'name' => 'Bourgogne'
        ]);

        Origin::create([
            'name' => 'Bretagne'
        ]);

        Origin::create([
            'name' => 'Centre'
        ]);

        Origin::create([
            'name' => 'Corse'
        ]);

        Origin::create([
            'name' => 'Deux-Sèvres'
        ]);

        Origin::create([
            'name' => 'Ecosse'
        ]);

        Origin::create([
            'name' => 'Est-Central'
        ]);

        Origin::create([
            'name' => 'Franche-Comté'
        ]);

        Origin::create([
            'name' => 'Grèce'
        ]);

        Origin::create([
            'name' => 'Hollande'
        ]);

        Origin::create([
            'name' => 'Inconnue'
        ]);

        Origin::create([
            'name' => 'Ile-de-France'
        ]);

        Origin::create([
            'name' => 'Ile de Ré'
        ]);

        Origin::create([
            'name' => 'Rhône-Alpes'
        ]);

        Origin::create([
            'name' => 'Val-de-Loire'
        ]);

    }
}
