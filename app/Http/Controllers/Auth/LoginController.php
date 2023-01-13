<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('Auth/Login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $credentials = $request->validate([
            'email'      => 'required',
            'password'  => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->with('level')->first();
        if(Auth::attempt($credentials)) {
            if($user->level->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah');
        }
    }
}
