<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa as ModelsDataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DataMahasiswa extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika user adalah admin, ambil semua data
        if ($user->role === 'admin') {
            $data = ModelsDataMahasiswa::all();
        } else {
            // Jika user bukan admin, ambil hanya satu data berdasarkan user_id
            $data = ModelsDataMahasiswa::where('user_id', $user->id)->take(1)->get();
        }
        return view('data_mahasiswa.index', ['data' => $data]);
    }

    public function tambah()
    {
        return view('data_mahasiswa.tambah');
    }


    public function edit($id)
    {
        $data = ModelsDataMahasiswa::find($id);
        return view('data_mahasiswa.edit', ['data' => $data]);
    }

    public function hapus($id)
    {

        $user = Auth::user();
        if ($user->role === 'admin') {
            $datamahasiswa = ModelsDataMahasiswa::find($id);
            if ($datamahasiswa) {
                $datamahasiswa->delete();
                Session::flash('success', 'Data berhasil dihapus');
            } else {
                Session::flash('error', 'Data tidak ditemukan');
            }
        } else {
            Session::flash('error', 'Anda tidak memiliki izin untuk menghapus data');
        }
        return redirect('/datamahasiswa');
    }

    // Create new data
    public function create(Request $request)
    {
        $request->validate([
           
                'nama_lengkap' => 'required|min:3',
                'email' => 'required|email|unique:datamahasiswa,email', // Validasi email unik tanpa ID
                'nim' => 'required|numeric|digits_between:1,10|unique:datamahasiswa,nim',
                'angkatan' => 'required|digits:4',
                'jurusan' => 'required',
                'tanggal_lahir' => 'nullable|date',
        ], [
            'nama_lengkap.required' => 'Name Wajib Di isi',
            'nama_lengkap.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'email.unique' => 'Email sudah digunakan',
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM harus berupa angka',
            'nim.digits_between' => 'NIM harus terdiri dari 1-10 digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.digits' => 'Masukan tahun angkatan 4 digit, misal: 2022',
            'jurusan.required' => 'Jurusan Wajib Di isi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir Invalid',
        ]);
        $user_id = Auth::id(); 
        ModelsDataMahasiswa::create([
            'user_id' => auth()->user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
        
        
        return redirect('/datamahasiswa')->with('success', 'Berhasil Menambahkan Data');
    }

    public function change(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:3',
            'email' => 'required|email|unique:datamahasiswa,email,' . $request->id, // Validasi email unik dengan ID
            'nim' => 'required|numeric|digits_between:1,10|unique:datamahasiswa,nim,' . $request->id,
            'angkatan' => 'required|digits:4',
            'jurusan' => 'required',
            'tanggal_lahir' => 'nullable|date',
        ], [
            'nama_lengkap.required' => 'Name Wajib Di isi',
            'nama_lengkap.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'email.unique' => 'Email sudah digunakan',
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM harus berupa angka',
            'nim.digits_between' => 'NIM harus terdiri dari 1-10 digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.digits' => 'Masukan tahun angkatan 4 digit, misal: 2022',
            'jurusan.required' => 'Jurusan Wajib Di isi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir Invalid',
        ]);

        $datamahasiswa = ModelsDataMahasiswa::find($request->id);
        $datamahasiswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        Session::flash('success', 'Berhasil Mengubah Data');
        return redirect('/datamahasiswa');
    }
}
