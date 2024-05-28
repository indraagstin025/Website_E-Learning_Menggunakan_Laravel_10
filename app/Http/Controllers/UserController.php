<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa as ModelsDataMahasiswa;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index()
    {

        return view('pointakses.user.index');

    }


    public function showFormMahasiswa()
    {
        $user = Auth::user();
        $isAdmin = $user && $user->role === 'admin'; // Contoh: memeriksa apakah role adalah 'admin'
        return view('user.user_mahasiswa_form');
    }


    public function showLoginForm()
    {

    return view('halaman_auth.login'); 
   
    }

}
