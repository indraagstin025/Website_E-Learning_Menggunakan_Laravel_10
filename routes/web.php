<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataMahasiswa;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UproleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DataInstructor;
use App\Http\Controllers\InstructorController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'halaman_depan/index');
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

    
    
});

// Rute Untuk Lupa Password


// Routes untuk admin
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Routes untuk user
Route::get('user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserController::class, 'login'])->name('user.login.post');
Route::post('user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('instructor/login', [InstructorController::class, 'showLoginForm'])->name('instructor.login');
Route::post('instructor/login', [InstructorController::class, 'login'])->name('instructor.login.post');
Route::post('instructor/logout', [InstructorController::class, 'logout'])->name('instructor.logout');


// Routes untuk forgot password (umum untuk admin dan user)
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');





Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/user');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('userAkses:user');
    Route::get('/instructor', [InstructorController::class, 'index'])->name('instructor')->middleware('userAkses:instructor');

    Route::get('/datamahasiswa', [DataMahasiswa::class, 'index'])->name('datamahasiswa');
    Route::get('/damatambah', [DataMahasiswa::class, 'tambah']);
    Route::get('/damaedit/{id}', [DataMahasiswa::class, 'edit']);
    Route::post('/damahapus/{id}', [DataMahasiswa::class, 'hapus']);

   

    Route::get('/datainstructor', [DataInstructor::class, 'index'])->name('datainstructor');
    Route::get('/tambahdatainstructor', [DataInstructor::class, 'tambah']);
    Route::get('/editdatainstructor/{id}', [DataInstructor::class, 'edit']);
    Route::post('/hapusdatainstructor/{id}', [DataInstructor::class, 'hapus']);

    Route::post('/tambahdatainstructor', [DataInstructor::class, 'create']);
    Route::post('/editdata', [DataInstructor::class, 'change']);



    Route::get('/usercontrol', [UserControlController::class, 'index'])->name('usercontrol');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // new
    Route::post('/tambahdama', [DataMahasiswa::class, 'create']);
    Route::post('/editdama', [DataMahasiswa::class, 'change']);

    Route::get('/tambahuc', [UserControlController::class, 'tambah']);
    Route::get('/edituc/{id}', [UserControlController::class, 'edit']);
    Route::post('/hapusuc/{id}', [UserControlController::class, 'hapus']);
    Route::post('/tambahuc', [UserControlController::class, 'create']);
    Route::post('/edituc', [UserControlController::class, 'change']);

    Route::post('/uprole/{id}', [UproleController::class, 'index']);
    Route::put('/uprole/{id}', [UproleController::class, 'update'])->name('uprole.update');



 // routes/web.php

 

    
    
    
    Route::post('/tambahuc', [UserControlController::class, 'create']);
    Route::post('/edituc', [UserControlController::class, 'change']);
   


    Route::post('/uprole/{id}', [UproleController::class, 'index']);

});
