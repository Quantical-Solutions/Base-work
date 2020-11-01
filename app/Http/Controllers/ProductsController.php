<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('front/products');
    }

    public function category($cat)
    {
        return view('front/product-category');
    }

    public function solo($cat, $article)
    {
        return view('front/product');
    }
}
