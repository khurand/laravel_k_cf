<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //Table name
    protected $table = 'categories';

    
    protected $fillable = [
        'Viande',
        'Legumes',
        'Fruits',
        'Epices',
        'Produits Régionaux',
        'Produits Laitiers',
        'Fromages',
        'Boissons'
    ];

    //Une catégorie contient plusieurs produits, relation hasMany entre les tables categories & products
    public function products()
    {
        return $this->hasMany(Product::class,'category');
    }

}
