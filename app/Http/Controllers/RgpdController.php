<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RgpdController extends Controller
{
    public function index()
    {
        return view('front/rgpd');
    }
}
