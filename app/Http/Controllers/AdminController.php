<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use App\Models\DataInstructor;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung jumlah mahasiswa
        $jumlahMahasiswa = DataMahasiswa::count();

        // Hitung jumlah instruktur
        $jumlahInstructor = DataInstructor::count();

        // Hitung jumlah kursus
        $jumlahMateri = Course::count();

        return view('pointakses.admin.index', [
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahInstructor' => $jumlahInstructor,
            'jumlahMateri' => $jumlahMateri
        ]);
    }

    public function showLoginForm()
    {
        return view('halaman_auth.login');
    }
}