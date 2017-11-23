<?php

namespace App\Http\Controllers;

use App\Product;
use App\Specification;

class ProductsController extends Controller
{
    public function show($slug)
    {
        $product = Product::findBySlug($slug);
        $specification = Specification::getAll();


        if ($product != null) {
            return view('products.show', ['product' => $product, 'specification' => $specification]);
        }
        return 'Ocorreu um error, estamos arrumando!';
    }
}
