<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        return view('site.register', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|regex:/^9[0-9]{8}$/',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ], [
            'firstname.required' => 'Este campo é obrigatório',
            'lastname.required' => 'Este campo é obrigatório',
            'email.required' => 'Este campo é obrigatório',
            'email.email' => 'Informe um email válido',
            'email.unique' => 'Este email já foi cadastrado, faça login!',
            'phone.regex' => 'O número de telefone deve começar com 9 e ter 9 dígitos',
            'phone.required' => 'Este campo é obrigatório',
            'password.required' => 'Este campo é obrigatório',
            'password.min' => 'A senha deve ter no minimo 8 caracteres',
            'password.confirmed' => 'Confirme a senha',
            'terms.accepted' => 'Você deve aceitar os termos e condições'
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        Auth::login($user);

        return redirect()->route('home.index')->with('success', 'Registro concluído com sucesso!');

    }
}
