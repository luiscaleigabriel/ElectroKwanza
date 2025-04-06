<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {
        $search = $request->input('search');

        $users = $user->when($search, function ($query, $search) {
            return $query->where('firstname', 'like', "%{$search}%")
                ->orWhere('lastname', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|string|max:20',
            'address'   => 'required|string',
            'role'      => 'required',
            'image'     => 'nullable|image|max:2048',
        ], [
            'firstname.required' => 'O nome é obrigatório.',
            'lastname.required'  => 'O sobrenome é obrigatório.',
            'email.required'     => 'O e-mail é obrigatório.',
            'email.email'        => 'O e-mail deve ser válido.',
            'email.unique'       => 'Este e-mail já está em uso.',
            'phone.required'     => 'O número de telefone é obrigatório.',
            'address.required'   => 'O endereço é obrigatório.',
            'role.required'      => 'O tipo de acesso é obrigatório.',
            'image.image'        => 'O arquivo precisa ser uma imagem.',
            'image.max'          => 'A imagem não pode ter mais que 2MB.',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $data['password'] = Hash::make('12345678');

        $created = User::create($data);

        if ($created) {
            return redirect()->route('admin.users')->with('success', 'Usuário criado com sucesso!');
        }

        return redirect()->route('admin.users')->with('error', 'Ocorreu um erro não foi possivel cadastrar o usuário!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, User $user)
    {
        $user = $user->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $user = $user->findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'phone'     => 'required|string|max:20',
            'address'   => 'required|string',
            'role'      => 'required',
            'image'     => 'nullable|image|max:2048',
        ], [
            'firstname.required' => 'O nome é obrigatório.',
            'lastname.required'  => 'O sobrenome é obrigatório.',
            'email.required'     => 'O e-mail é obrigatório.',
            'email.email'        => 'O e-mail deve ser válido.',
            'email.unique'       => 'Este e-mail já está em uso.',
            'phone.required'     => 'O número de telefone é obrigatório.',
            'address.required'   => 'O endereço é obrigatório.',
            'role.required'      => 'O tipo de acesso é obrigatório.',
            'image.image'        => 'O arquivo precisa ser uma imagem.',
            'image.max'          => 'A imagem não pode ter mais que 2MB.',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Exclui imagem antiga
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $updated = $user->update($data);

        if ($updated) {
            return redirect()->route('admin.users')->with('success', 'Usuário atualizado com sucesso!');
        }

        return redirect()->route('admin.users')->with('error', 'Ocorreu um erro ao tentar atualizar os dados do usuário!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $user)
    {
        $user = $user->findOrFail($id);

        // Remove a imagem se existir
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        // Remove o usuário
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Usuário excluído com sucesso!');
    }
}
