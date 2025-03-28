<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->role == 'admin') {
                return redirect()->route('dash');
            }elseif($user->role == 'seller') {

            }elseif($user->role == 'customer') {

            }
        }

        return redirect()->route('login')->withErrors('Usuário ou senha inválida!');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
