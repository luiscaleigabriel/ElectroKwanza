<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Digite um email válido',
            'password.required' => 'O campo senha é obrigatório'
        ]);

        

    }
}
