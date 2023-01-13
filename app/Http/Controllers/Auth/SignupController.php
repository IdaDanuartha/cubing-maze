<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\Cuber;
use App\Models\User;

class SignupController extends Controller
{
    public function index()
    {
        return inertia('Auth/Signup');
    }

    public function register(SignupRequest $request)
    {
        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $cuber = new Cuber([
            'name' => $request->name
        ]);

        try {
            if($user && $cuber) {
                $user->save();
            
                $cuber->user_id = $user->id;
                $cuber->save();

                session()->flash('success', 'Account created successfully! Please login!!');
                return redirect()->route('login');
            } else {
                return session()->flash('error', 'Account created failed');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
