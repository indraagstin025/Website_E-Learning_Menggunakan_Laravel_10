<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(): View
    {
        return view('halaman_auth.forgetPassword');
    }

    /**
     * Handle the submission of the forget password form.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function submitForgetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        // Create a password reset record
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        try {
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        } catch (\Exception $e) {
            return back()->with('error', 'There was an error sending the email.');
        }

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Show the reset password form.
     *
     * @param string $token
     * @return View
     */
    public function showResetPasswordForm($token): View
    {
        return view('halaman_auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Handle the submission of the reset password form.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $updatePassword = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update(['password' => Hash::make($request->password)]);
            PasswordReset::where(['email' => $request->email])->delete();
        }

        switch ($user->role) { // Atau cara lain untuk menentukan peran pengguna
            case 'admin':
                $intendedRoute = 'admin.login';
                break;
            case 'user':
                $intendedRoute = 'user.login';
                break;
            case 'instructor':
                $intendedRoute = 'instructor.login';
                break;
            // Tambahkan case lain jika diperlukan
            default:
                $intendedRoute = 'login'; // Rute default jika peran tidak dikenali
        }
    
        return redirect()->route($intendedRoute)->with('success', 'Password telah berhasil diperbarui!');

    }
}
