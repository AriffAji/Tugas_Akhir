<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TloginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($credentials)) {
            // dd($request);
            $request->session()->regenerate();

            if (auth()->user()->role_id == '4') {
                return redirect()->intended('/dashboardA');
            } else if (auth()->user()->role_id == '3') {
                return redirect()->intended('/dashboardD');
            } else if (auth()->user()->role_id == '1') {
                return redirect()->intended('/dashboardM');
            } else if (auth()->user()->role_id == '2') {
                return redirect()->intended('/dashboardS');
            } else if (auth()->user()->role_id == '5') {
                return redirect()->intended('/roles');
            } else {
                return redirect()->intended('/login');
            }
        }

        return back()->with(
            'loginError',
            'Login Failed'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}