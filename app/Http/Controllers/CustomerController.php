<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Category $category, SubCategory $subcategory, User $user)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        $user = $user->find(Auth::user()->id);

        return view('user.index', compact('categories', 'subcategories', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|regex:/^9[0-9]{8}$/|unique:users,phone,' . Auth::user()->id,
            'address' => 'required',
        ], [
            'firstname.required' => 'Este campo é obrigatório',
            'lastname.required' => 'Este campo é obrigatório',
            'email.required' => 'Este campo é obrigatório',
            'email.email' => 'Informe um email válido',
            'email.unique' => 'Este email já foi cadastrado, faça login!',
            'phone.regex' => 'O número de telefone deve começar com 9 e ter 9 dígitos',
            'phone.required' => 'Este campo é obrigatório',
            'phone.unique' => 'Este número já foi cadastrado, informe outro número!',
            'address.required' => 'Este campo é obrigatório'
        ]);

        $user = $user->findOrFail(Auth::user()->id);

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];

        $updated = $user->update($data);

        if($updated) {
            return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        }else {
            return redirect()->back()->with('error', 'Ocorreu um erro! Tente novamente.');
        }
    }

    public function newpassindex(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('user.resetpass', compact('categories', 'subcategories'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Este campo é obrigatório',
            'password.min' => 'A senha deve ter no minimo 8 caracteres',
            'password.confirmed' => 'Confirme a senha',
        ]);

        

    }
}
