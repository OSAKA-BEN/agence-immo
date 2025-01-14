<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.property.index');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté');
    }
}
