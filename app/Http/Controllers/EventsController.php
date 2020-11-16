<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        return view('front/events');
    }

    public function event($name)
    {
        return view('front/event');
    }
}
