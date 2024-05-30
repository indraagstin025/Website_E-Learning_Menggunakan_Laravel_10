<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataInstructor;
use Illuminate\Support\Facades\Auth;

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
        $isAdmin = false; // Default ke false
        if (Auth::check()) { // Periksa jika sudah login
            $isAdmin = Auth::user()->role === 'admin';
        }
        return view('instructor.user_instructor_form', compact('isAdmin'));
    }
    

    public function storeInstructor(Request $request)
    {
       
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:datamahasiswa,email',
            'nidn' => 'required|max:10|unique:datamahasiswa,nim',
            'nidn' => 'required|digits:10',
            'program_studi' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal harus 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'nidn.required' => 'NIDN wajib diisi',
            'nidn.max' => 'NIDN maksimal 10 karakter',
            'nidn.unique' => 'NIDN sudah digunakan',
            'program_studi.required' => 'Program studi wajib diisi',
            'program_studi.digits' => 'Program Studi Wajib di isi',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir tidak valid',
        ]);
    
        
        DataInstructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'program_studi' => $request->program_studi,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
    
        return redirect()->route('datainstructor')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function showLoginForm()
{
    return view('halaman_auth.login'); 
}

}
