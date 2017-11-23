<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //Encontrar produto por Slug
    public static function findBySlug($slug){
        return static::with('products', 'user')->where('slug', $slug)->first();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

