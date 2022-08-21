<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class TregisterController extends Controller
{
    public function index(){
        return view('login.register');
    }

    public function create(Request $request){
       $validatedData=$request->validate([
            'username' => 'required|max:100|string|unique:users',
            'nim' => 'required|min:10|max:18',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role_id' => ''
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role_id']=4;
        User::create($validatedData);

        return redirect('/login')->with('success', 'Berhasil mendaftar!! Silahkan Login');
    }
}