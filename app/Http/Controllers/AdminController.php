<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('pointakses/admin/index');
    }

    public function showLoginForm()
    {
        return view('halaman_auth.login'); 
    }
}
