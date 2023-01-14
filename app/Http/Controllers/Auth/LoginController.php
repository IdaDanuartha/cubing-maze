<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->with('level')->first();        
        $remember = $request->has('remember_me');        

        if(Auth::attempt($request->validated(), $remember)) {
            if($remember) {
                cookie('email', $request->email, 1440);
            } else {
                cookie()->forget('email');
            }
            
            if($user->level->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Ouchh!! Your email or password is wrong');
        }
    }
}
