<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserControlController extends Controller
{
    function index()
    {
        $data = User::all();
        return view('user_control.index', ['uc' => $data]);
    }

    function tambah()
    {
        return view('user_control.tambah');
    }
    function create(Request $request)
    {
        $str = Str::random(100);
        $gambar = '';

        $request->validate([
            'fullname' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'fullname.required' => 'Full Name Wajib Di isi',
            'fullname.min' => 'Bidang Full Name minimal harus 4 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'password.required' => 'Password Wajib Di isi',
            'password.min' => 'Password minimal harus 6 karakter.',
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

        $accounts = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'verify_key' => $str,
            'gambar' => $gambar,
        ]);

        $details = [
            'nama' => $accounts->fullname,
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'Laravel10 - Pendaftaran melalui SMTP + Multiuser + CRUD + Sweetalert',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $accounts->verify_key,
        ];

        Mail::to($request->email)->send(new AuthMail($details));

        Session::flash('success', 'User berhasil ditambahkan , Harap verifikasi akun sebelum di gunakan.');

        return redirect('/usercontrol');
    }

    function edit($id)
    {
        $data = User::where('id', $id)->get();
        return view('user_control.edit', ['uc' => $data]);
    }
    function change(Request $request)
    {
        $request->validate([
            'gambar' => 'image|file|max:1024',
            'fullname' => 'required|min:4',
        ], [
            'gambar.image' => 'File Wajib Image',
            'gambar.file' => 'Wajib File',
            'gambar.max' => 'Bidang gambar tidak boleh lebih besar dari 1024 kilobyte',
            'fullname.required' => 'Nama Wajib Di isi',
            'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
        ]);



        $user = User::find($request->id);

        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('gambar'), $nama_foto);
            $user->gambar = $nama_foto;
        }

        $user->fullname = $request->fullname;
        $user->password = $request->password;
        $user->save();

        Session::flash('success', 'User berhasil diedit');

        return redirect('/usercontrol');
    }
    function hapus(Request $request)
    {
        User::where('id', $request->id)->delete();

        Session::flash('success', 'Data berhasil dihapus');

        return redirect('/usercontrol');
    }
}
