<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresseController extends Controller
{
    public function index()
    {
        return view('front/presse');
    }

    public function category($cat)
    {
        return view('front/presse-category');
    }

    public function article($cat, $article)
    {
        return view('front/presse-article');
    }
}
