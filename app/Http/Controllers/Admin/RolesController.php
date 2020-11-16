<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        return view('admin/tools/scrud', ['title' => 'Rôles']);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => 'Rôle']);
    }
}
