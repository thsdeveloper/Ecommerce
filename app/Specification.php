<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Specification extends Model
{
    public static function getAll(){
        return static::orderBy('name')->get();
    }
}
