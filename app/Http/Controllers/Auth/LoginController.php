<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // below the code for login controller
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            Auth::login($user); // for creating the session token
            return redirect()->route('tasks.index');
        } else {
            return back()->withErrors(['Invalid credentials!']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
