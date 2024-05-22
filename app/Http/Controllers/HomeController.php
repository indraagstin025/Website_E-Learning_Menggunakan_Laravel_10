<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $darkModeEnabled;

    public function __construct()
    {
        // Tentukan logika untuk menentukan apakah tema gelap diaktifkan
        $this->darkModeEnabled = true; // Misalnya, di sini kita setel tema gelap aktif
    }

    public function index()
    {
        // Melewatkan variabel ke tampilan
        return view('halaman_dashboard.index')->with('darkModeEnabled', $this->darkModeEnabled);
    }

    // Metode lainnya...
}
