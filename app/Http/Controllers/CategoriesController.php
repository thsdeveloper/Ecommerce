<?php

namespace App\Http\Controllers;


use App\Categorie;
use App\Product;

class CategoriesController extends Controller
{

    public function show($slug)
    {
        $categoria = Categorie::where('slug', $slug)->first();
        $produtos = Product::where('category_id', $categoria->id)->get();


        if ($produtos != null) {
            return view('categories.show', ['produtos' => $produtos]);
        }
        return 'Ocorreu um error, estamos arrumando!';


    }
}
