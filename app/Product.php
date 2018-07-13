<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Tag;
use App\Label;

class Product extends Model
{
    //Table name
    protected $table = 'products';

    protected $fillable = [
        'name', 
        'price', 
        'category',
        'tva',
        'unit',
        'weight',
        'name',
        'price',
        'tva',
        'unit',
        'weight',
        'convertedPrix', 
        'labels',
        'tags',
        'origin',
        'desc',
        'prix_ht'
    ];

    //Un produit appartient à 1 categorie, relation belongsTo entre les tables categories & products
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Un produit appartient à 1 user, relation belongsTo entre les tables users & products
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Un produit contient plusieurs tags, relation hasMany entre les tables products & tags
    public function tags(){
        return $this->hasMany(Tag::Class);
    }

    //Un produit contient plusieurs labels(labels), relation hasMany entre les tables products & labels
    public function labels(){
        return $this->hasMany(Label::Class);
    }


}
