<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index()
    {
        return view('front/learnings');
    }

    public function category($cat)
    {
        return view('front/learning-category');
    }

    public function solo($cat, $name)
    {
        return view('front/learning');
    }
}
