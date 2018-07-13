<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Label extends Model
{
    //Table name
    protected $table = 'labels';

    protected $fillable = [
        'Aucun',
        'Bio',
        'AOP',
        'AOC',
        'IGP',
        'STG',
        'Produits Certifiés',
        'Fair-Trade',
        'Autre',
        'AB'
    ];

    //On a un labelqui appartient à un produit, relation belongsTo entre les tables labels & products
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
