<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Tag extends Model
{
    //Table name
    protected $table = 'tags';

    protected $fillable = [
        'Aucun', 
        'Bio', 
        'Hallal',
        'Raclette',
        'Apero',
        'Paniers',
        'Brunch',
        'Sans gluten'
    ];
    //On a un tag qui appartient à un produit, relation belongsTo entre les tables tags & products
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
