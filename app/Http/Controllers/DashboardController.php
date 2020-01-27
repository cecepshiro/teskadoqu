<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Halaman Dashboard Admin
    public function index()
    {
        return view('admin.index');
    }
}
