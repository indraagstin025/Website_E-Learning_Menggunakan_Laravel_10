<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataInstructor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InstructorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('pointakses/instructor/index');
    }

    public function showFormInstructor()
    {

        $user_id = Auth::id();
        $datainstructor = DataInstructor::where('user_id', $user_id)->first();
        $isAdmin = false;
        if (Auth::check()) {
            $isAdmin = Auth::user()->role === 'admin';
        }

        if ($datainstructor) {
            return redirect()->route('datainstructor')->with('message', 'Data instructor sudah diisi.');
        } else {
            return view('instructor.user_instructor_form', compact('isAdmin'));
        }
    }


    public function storeInstructor(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required|min:3',
            'email' => 'required|email|unique:datainstructor,email', // Pastikan email unik
            'nidn' => 'required|numeric|digits_between:1,10|unique:datainstructor,nidn', // Digits_between for length
            'departemen' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'gambar' => 'required|image|file|max:1024', // Tanggal lahir opsional

        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'nama_lengkap.min' => 'Nama lengkap minimal harus 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'nidn.required' => 'NIDN wajib diisi',
            'nidn.numeric' => 'NIDN harus berupa angka',
            'nidn.digits_between' => 'NIDN harus terdiri dari 1-10 digit',
            'departemen.required' => 'Departemen wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file',
            'gambar.max' => 'Ukuran gambar maksimal 1MB',

        ]);

        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar = $nama_foto;
        } else {
            $gambar = "user.jpeg";
        }


        $user_id = Auth::id();
        DataInstructor::create([
            'user_id' => $user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'departemen' => $request->departemen,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gambar' => $gambar,

        ]);

        return redirect()->route('datainstructor')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function showLoginForm()
    {

        return view('halaman_auth.login');
    }
}
