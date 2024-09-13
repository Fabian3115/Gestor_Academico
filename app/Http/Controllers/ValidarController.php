<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ValidarController extends Controller
{
    public function index () 
    {
        return view('Login.login');
    }

    public function login (Request $request)
    {
        $credencials = $request -> validate([
            'usuario'=> 'required|string|max:10',
            'password'=> 'required|string',
        ]);

        if (Auth::attempt($credencials)) {
            $request->session()->regenerate();
            $user = Auth::user(); 
            
            if ($user->rol === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->rol === 'user') {
                return redirect()->route('user.dashboard');
            }
        }
    }
}
