<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    //Table name
    protected $table = 'origins';

    protected $fillable = [    
        'Angleterre', 
        'Ariège', 
        'Auvergne', 
        'Aveyron', 
        'Berry', 
        'Bourgogne',
        'Bretagne',
        'Centre',
        'Corse',
        'Deux-Sèvres',
        'Ecosse',
        'Est-Central',
        'Franche-Comté',
        'Grèce', 
        'Hollande',
        'Inconnue', 
        'Ile-de-France',
        'Ile de Ré',
        'Rhône-Alpes', 
        'Val-de-Loire'
    ];
}
