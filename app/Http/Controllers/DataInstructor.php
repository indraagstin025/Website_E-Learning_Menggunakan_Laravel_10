<?php

namespace App\Http\Controllers;

use App\Models\DataInstructor as ModelsDataInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataInstructor extends Controller
{
    function index()
    {
        $data = ModelsDataInstructor::all();
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

    // DataMahasiswa.php

    public function form()
    {

    return view('user_mahasiswa_form'); 
    
    }

    function hapus(Request $request)
    {
        ModelsDataInstructor::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('/datainstructor');
    }
    // new
    function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nidn' => 'required|max:10',
            'program_studi' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'nidn.required' => 'NIDN Wajib Di isi',
            'nidn.max' => 'NIDN max 10 Digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'program_studi.required' => 'Program Studi Wajib Di isi',
        ]);

        ModelsDataInstructor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'program_studi' => $request->program_studi,
            
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/datainstructor')->with('success', 'Berhasil Menambahkan Data');
    }
    function change(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nidn' => 'required|max:10',
            'program_studi' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'nidn.required' => 'NIDN Wajib Di isi',
            'nidn.max' => 'NIDN max 10 Digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'program_studi.required' => 'Program Studi Wajib Di isi',
        ]);

        $datainstructor = ModelsDataInstructor::find($request->id);

        $datainstructor->name = $request->name;
        $datainstructor->email = $request->email;
        $datainstructor->nidn = $request->nidn;
        $datainstructor->program_studi = $request->program_studi;
        $datainstructor->save();

        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/datainstructor');
    }
}
