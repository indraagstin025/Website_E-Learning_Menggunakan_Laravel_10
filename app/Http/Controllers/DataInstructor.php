<?php

namespace App\Http\Controllers;

use App\Models\DataInstructor as ModelsDataInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DataInstructor extends Controller
{
    function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $data = ModelsDataInstructor::all();
        } else {

            $data = ModelsDataInstructor::where('user_id', $user->id)->take(1)->get();
        }

        return view('data_instructor.index', ['data' => $data]);
    }
    function tambah()
    {
        return view('data_instructor.tambah');
    }
    function edit($id)
    {
        $data = ModelsDataInstructor::find($id);

        return view('data_instructor.edit', ['data' => $data]);
    }

    public function form()
    {

        return view('user_mahasiswa_form');
    }

    function hapus($id)
    {

        $user = Auth::user();
        if ($user->role === 'admin') {
            $datainstructor = ModelsDataInstructor::find($id);
            if ($datainstructor) {
                $datainstructor->delete();
                Session::flash('success', 'Data berhasil dihapus');
            } else {
                Session::flash('error', 'Data tidak ditemukan');
            }
        } else {
            Session::flash('error', 'Anda tidak memiliki izin untuk menghapus data');
        }

        return redirect('/datainstructor');
    }
    function create(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:3',
            'email' => 'required|email|unique:datainstructor,email',
            'nidn' => 'required|numeric|digits_between:1,10|unique:datainstructor,nidn',
            'departemen' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'gambar' => 'required|image|file',

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
            'gambar.required' => 'Gambar wajib di upload',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file',


        ]);

        if ($request->hasFile('gambar')) {

            $request->validate(['gambar' => 'mimes:jpeg,jpg,png,gif|image|file|max:1024']);

            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar = $nama_foto;
        } else {
            $gambar = "user.jpeg";
        }
        $user_id = Auth::id();
        ModelsDataInstructor::create([
            'user_id' => $user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'departemen' => $request->departemen,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gambar' => $gambar,


        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/datainstructor')->with('success', 'Berhasil Menambahkan Data');
    }
    function change(Request $request, DataInstructor $datainstructor)
    {
       
        $request->validate([
            'nama_lengkap' => 'required|min:3',
            'email' => 'required|email|unique:datainstructor,email,' . $request->id,
            'nidn' => 'required|numeric|digits_between:1,10|unique:datainstructor,nidn,' . $request->id,
            'departemen' => 'required',
            'tanggal_lahir' => 'nullable|date', 
           

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
            

        ]);

        $datainstructor = ModelsDataInstructor::find($request->id);
        if ($request->hasFile('gambar')) {

            $request->validate(['gambar' => 'mimes:jpeg,jpg,png,gif|image|file|max:1024']);

            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar = $nama_foto;
        } else {
            $gambar = "user.jpeg";
        }
        $user_id = Auth::id();
        $datainstructor->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'departemen' => $request->departemen,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gambar' => $datainstructor->gambar,
        ]);


        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/datainstructor');
    }
}
