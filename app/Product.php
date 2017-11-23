<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //Encontrar produto por Slug
    public static function findBySlug($slug){
        return static::with('category', 'brand')->where('slug', $slug)->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
