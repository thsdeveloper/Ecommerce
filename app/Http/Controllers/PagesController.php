<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($slug)
    {
        $page = Page::findBySlug($slug);

        if ($page != null) {
            return view('pages.show', ['page' => $page]);
        }
       return 'Falta criar a página no admin!';
    }
}
