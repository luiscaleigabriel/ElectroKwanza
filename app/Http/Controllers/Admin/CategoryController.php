<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $search = $request->input('search');

        $categories = $category->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:categories,name',
            'description' => 'required|string',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome tem de ter no maximo 15 caracteres',
            'name.unique' => 'A categoria que quer cadastrar já existe',
            'description.required' => 'O campo descrição é obrigatório',
        ]);

        $slug = Str::slug($request->input('name'));

        $created = $category->create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'description' => $request->input('description'),
        ]);

        if ($created) {
            return redirect()->route('admin.categories')->with('success', 'Categoria criada com sucesso!');
        } else {
            return redirect()->route('admin.categories')->with('error', 'Ocorreu um erro ao tentar criar a categoria tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Category $category)
    {
        $category = $category->findOrFail($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $category = $category->findOrFail($id);
        return view('admin.category.create_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $category = $category->findOrFail($id);

        $request->validate([
            'name' => 'required|max:20|unique:categories,name,'. $category->id,
            'description' => 'required|string',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome tem de ter no maximo 15 caracteres',
            'name.unique' => 'A categoria que quer cadastrar já existe',
            'description.required' => 'O campo descrição é obrigatório',
        ]);

        $updated = $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
        ]);

        if ($updated) {
            return redirect()->route('admin.categories')->with('success', 'Categoria atualizada com sucesso!');
        } else {
            return redirect()->route('admin.categories')->with('error', 'Ocorreu um erro ao tentar atualizar a categoria tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Category $category)
    {
        $category = $category->findOrFail($id);

        try {
            $category->delete();
            return redirect()->route('admin.categories')->with('success', 'Categoria deletada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories')->with('error', 'Erro ao deletar a categoria.');
        }
    }
}
