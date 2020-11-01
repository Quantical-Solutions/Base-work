<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        return view('admin/products');
    }

    public function mode($mode, $id)
    {
        return view('admin/tools/edit-read');
    }
}
