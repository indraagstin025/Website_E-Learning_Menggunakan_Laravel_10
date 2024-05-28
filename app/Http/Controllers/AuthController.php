<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index()
    {
        return view('halaman_auth/login');
    
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->email_verified_at != null) {
                switch (Auth::user()->role) {
                    case 'admin':
                        return redirect()->route('admin')->with('success', 'Halo Admin, Anda berhasil login');
                    case 'user':
                        return redirect()->route('user')->with('success', 'Berhasil login');
                    case 'instructor':
                        return redirect()->route('instructor')->with('success', 'Berhasil login');
                    default:
                        Auth::logout();
                        return redirect()->route('auth')->withErrors('Role tidak dikenal');
                }
            } else {
                Auth::logout();
                return redirect()->route('auth')->withErrors('Akun anda belum Aktif. Harap Verifikasi terlebih dahulu');
            }
        } else {
            return redirect()->route('auth')->withErrors('Email atau password salah');
        }
    
    }
    function create()
    {
        return view('halaman_auth/register');
    }
    function register(Request $request)
    {
        $str = Str::random(100);

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'gambar' => 'required|image|file',
        ], [
            'fullname.required' => 'Full Name wajib diisi',
            'fullname.min' => 'Full Name minimal 5 karakter',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'gambar.required' => 'Gambar wajib di upload',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file',
        ]);

        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'gambar' => $nama_gambar,
            'verify_key' => $str,
            'role' => 'user'
        ];

        User::create($inforegister);

        $details = [
            'nama' => $inforegister['fullname'],
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'Learning Management System',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Link verifikasi telah dikirim ke email anda. Cek email untuk melakukan verifikasi');
    }
    function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return redirect()->route('auth')->with('success', 'Verifikasi berhasil. akun anda sudah aktif.');
        } else {
            return redirect()->route('auth')->withErrors('Keys tidak valid. pastikan telah melakukan register')->withInput();
        }
    }
    
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('halaman_auth.register');
    }
}
