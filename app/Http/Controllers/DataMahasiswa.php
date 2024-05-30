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
        $data = ModelsDataMahasiswa::all();
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

    public function hapus(Request $request)
    {
        ModelsDataMahasiswa::where('id', $request->id)->delete();
        Session::flash('success', 'Berhasil Hapus Data');
        return redirect('/datamahasiswa');
    }

    // Create new data
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:datamahasiswa,email',
            'nim' => 'required|max:10|unique:datamahasiswa,nim',
            'angkatan' => 'required|digits:4',
            'jurusan' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'email.unique' => 'Email sudah digunakan',
            'nim.required' => 'Nim Wajib Di isi',
            'nim.max' => 'NIM max 10 Digit',
            'nim.unique' => 'NIM sudah digunakan',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.digits' => 'Masukan tahun angkatan 4 digit, misal: 2022',
            'jurusan.required' => 'Jurusan Wajib Di isi',
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di isi',
            'nama_lengkap.max' => 'Nama Lengkap max 255 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di isi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir Invalid',
        ]);

        ModelsDataMahasiswa::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect('/datamahasiswa')->with('success', 'Berhasil Menambahkan Data');
    }

    public function change(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:datamahasiswa,email,' . $request->id,
            'nim' => 'required|min:8|max:8|unique:datamahasiswa,nim,' . $request->id,
            'angkatan' => 'required|digits:4',
            'jurusan' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'email.unique' => 'Email sudah digunakan',
            'nim.required' => 'Nim Wajib Di isi',
            'nim.min' => 'NIM min 8 Digit',
            'nim.max' => 'NIM max 8 Digit',
            'nim.unique' => 'NIM sudah digunakan',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.digits' => 'Masukan tahun angkatan 4 digit, misal: 2022',
            'jurusan.required' => 'Jurusan Wajib Di isi',
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di isi',
            'nama_lengkap.max' => 'Nama Lengkap max 255 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di isi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir Invalid',
        ]);

        $datamahasiswa = ModelsDataMahasiswa::find($request->id);
        $datamahasiswa->update([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        Session::flash('success', 'Berhasil Mengubah Data');
        return redirect('/datamahasiswa');
    }
}
