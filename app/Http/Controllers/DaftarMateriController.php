<?php

namespace App\Http\Controllers;

use App\Models\Course as ModelsCourse;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class DaftarMateriController extends Controller
{
    function index()
    {
        $data = ModelsCourse::all();

        $isAdmin = false; 
        if (Auth::check()) { 
            $isAdmin = Auth::user()->role === 'admin'; 
        }
        return view('data_materi.index', ['data' => $data]);
    }


    function tambah()
    {
        $isAdmin = false; 
        if (Auth::check()) { 
            $isAdmin = Auth::user()->role === 'admin'; 
        }

        return view('data_materi.tambah');


    }


    function store(Request $request)
    {

        $data = new course();

        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $data->file = $filename;

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;

        $data->save();
        return redirect()->back();
    }

    function datamateri()
    {
        $data = course::all();
        return view('index', compact('data'));
    }

    function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }

    function view($id)
    {
        $data = course::find($id);
        return view('data_materi.viewproduct', compact('data'));
    }
}
