<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Categorie;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->get();
        $banner = Banner::where('status', 1)->get();

        return view('home', compact('products', 'banner'));
    }
}
