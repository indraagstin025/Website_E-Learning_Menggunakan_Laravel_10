<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        return view('pointakses/user/index');
    }

    public function showLoginForm()
{
    return view('halaman_auth.login'); // Ganti 'halaman_auth.login' dengan nama view login Anda yang sesuai
}

}
