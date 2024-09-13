<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidarController extends Controller
{
    public function index () 
    {
        return view('Login.login');
    }

    public function login (Request $request)
    {
        $creddencials = $request -> validate([
            'usuario'=> 'required|string|max:10',
            'password'=> 'required|string',
        ]);
    }
}
