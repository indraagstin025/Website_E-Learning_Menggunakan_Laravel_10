<?php

namespace App\Http\Controllers;

use App\Models\Course as ModelsCourse;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    function index()
    {
        $data = Course::all();

        $isAdmin = Auth::check() && Auth::user()->role === 'admin';
        $isInstructor = Auth::check() && Auth::user()->role === 'instructor';
        $isUser = Auth::check() && Auth::user()->role === 'user';

        return view('data_materi.index', compact('data', 'isAdmin', 'isInstructor', 'isUser'));
    }


    function tambah()
    {
        $data = Course::all();

        $isAdmin = Auth::check() && Auth::user()->role === 'admin';
        $isInstructor = Auth::check() && Auth::user()->role === 'instructor';

        return view('data_materi.tambah', compact('data', 'isAdmin', 'isInstructor'));
    }

    function hapus(Request $request)
    {
        ModelsCourse::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('/datamateri');
    }
    function store(Request $request)
    {

        $data = new Course();

        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $data->file = $filename;

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;

        $data->save();
        return redirect('datamateri')->with('succes', 'Anda berhasil mengunggah materi');
    }

    function datamateri()
    {
        $data = Course::all();
        return view('index', compact('data'));
    }

    function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }

    function  view($id)
    {
        $course = Course::find($id);
        if (!$course){

            return redirect('/datamateri')->with('error', 'Course not found.');

        }

        $isEnrolled = false ;
        if (Auth::check()) {
            $isEnrolled = $course->users->contains(Auth::id());
        }

        return view('data_materi.viewproduct', compact('course', 'isEnrolled'));
        
    }

    public function enroll($id)
    {
        $course = Course::find($id);
        if ($course){
            $course->users()->attach(Auth::id());
            return redirect()->back()->with('success', 'Anda berhasil Enrolled course ini');
        } else {
            return redirect()->back()->with('error', 'Anda belum enroll course ini');
        }
    }

    public function unenroll($id)
    {
        $course = Course::find($id);
        if($course) {
            $course->users()->detach(Auth::id());
            return redirect()->back()->with('success', 'Anda berhasil unenrolled course ini');
        } else {
            return redirect()->back()->with('error', 'Course Not Found');
        }
    }
}
