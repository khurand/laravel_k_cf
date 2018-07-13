<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Label;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::create([
            'name' => 'Aucun'
        ]);
    
        Label::create([
            'name' => 'Bio'
        ]);

        Label::create([
            'name' => 'AOP'
        ]);

        Label::create([
            'name' => 'AOC'
        ]);

        Label::create([
            'name' => 'IGP'
        ]);

        Label::create([
            'name' => 'STG'
        ]);
    
        Label::create([
            'name' => 'Produits Certifiés'
        ]);
    
        Label::create([
            'name' => 'Fair-Trade'
        ]);
    
        Label::create([
            'name' => 'Autre'
        ]);
    
        Label::create([
            'name' => 'AB'
        ]);
    }
}
