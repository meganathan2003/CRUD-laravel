<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Registercontroller extends Controller
{
    // Below the code for storing function
    public function store(Request $request){

        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            "password_confirmation"=>"required"
        ]);
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();

        Auth::login($user); // True means manually we set remeber me

        return redirect('/login');
    }
}
