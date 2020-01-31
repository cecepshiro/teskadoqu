<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    //Halaman Dashboard Admin
    public function index()
    {
        return view('admin.index');
    }
}
