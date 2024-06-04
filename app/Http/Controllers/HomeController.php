<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $darkModeEnabled;

    public function __construct()
    {

        $this->darkModeEnabled = true; // Misalnya, di sini kita setel tema gelap aktif
    }

    public function index()
    {

        return view('halaman_dashboard.index')->with('darkModeEnabled', $this->darkModeEnabled);
    }
}
