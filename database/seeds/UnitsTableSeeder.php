<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name' => 'Kg'
        ]);
    
        Unit::create([
            'name' => 'Bouteille'
        ]);
    
        Unit::create([
            'name' => 'Sachet'
        ]);
    
        Unit::create([
            'name' => 'Pot'
        ]);
    
        Unit::create([
            'name' => 'Panier'
        ]);
    
        Unit::create([
            'name' => 'Lot'
        ]);
    
        Unit::create([
            'name' => 'Piece'
        ]);
    
        Unit::create([
            'name' => 'Autre'
        ]);

    }
}
