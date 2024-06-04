<?php

// app/Http/Controllers/MahasiswaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $isAdmin = $user && $user->role === 'admin'; // Memeriksa role

        $data = DataMahasiswa::where('user_id', $user->id)->get();
        return view('data_mahasiswa_index', compact('data', 'isAdmin'));
    }

    public function getmahasiswa()
    {
        $data = DataMahasiswa::where('user_id', Auth::user()->id)->get();
        return view('user_mahasiswa_form', ['data' => $data]);
    }
}
