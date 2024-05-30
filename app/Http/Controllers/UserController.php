<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa; // Import model DataMahasiswa
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('pointakses.user.index');
    }

    public function showFormMahasiswa()
    {
        $isAdmin = false; // Default ke false
        if (Auth::check()) { // Periksa jika sudah login
            $isAdmin = Auth::user()->role === 'admin';
        }
        return view('user.user_mahasiswa_form', compact('isAdmin'));
    }

    public function storeMahasiswa(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:datamahasiswa,email',
            'nim' => 'required|max:10|unique:datamahasiswa,nim',
            'angkatan' => 'required|digits:4',
            'jurusan' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal harus 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'nim.required' => 'NIM wajib diisi',
            'nim.max' => 'NIM maksimal 10 karakter',
            'nim.unique' => 'NIM sudah digunakan',
            'angkatan.required' => 'Angkatan wajib diisi',
            'angkatan.digits' => 'Angkatan harus berupa 4 digit angka',
            'jurusan.required' => 'Jurusan wajib diisi',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir tidak valid',
        ]);
    
        // 2. Simpan Data ke Database
        DataMahasiswa::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
    
        // 3. Redirect dengan Pesan Sukses
        return redirect()->route('datamahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function showLoginForm()
    {
        return view('halaman_auth.login');
    }
}
