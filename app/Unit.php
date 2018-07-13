<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';


    protected $fillable = [
        'Kg', 
        'Bouteille', 
        'Sachet', 
        'Pot', 
        'Panier', 
        'Lot', 
        'Pièce', 
        'Autre'
    ];
}
