<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SubCategory $subcategory, Category $category)
    {
        $categories = $category->all();

        $search = $request->input('search');

        $subcategories = $subcategory->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('admin.subcategory.create_edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:subcategories,name',
            'category_id' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome tem de ter no maximo 15 caracteres',
            'name.unique' => 'A subcategoria que quer cadastrar já existe',
            'description.required' => 'O campo descrição é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório',
        ]);


        $slug = Str::slug($request->input('name'));

        $created = $subcategory->create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
        ]);

        if ($created) {
            return redirect()->route('admin.subcategories')->with('success', 'Subcategoria criada com sucesso!');
        } else {
            return redirect()->route('admin.subcategories')->with('error', 'Ocorreu um erro ao tentar criar a subcategoria tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, SubCategory $subcategory)
    {
        $subcategory = $subcategory->findOrFail($id);
        return response()->json($subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, SubCategory $subcategory, Category $category)
    {
        $categories = $category->all();
        $subcategory = $subcategory->findOrFail($id);
        return view('admin.subcategory.create_edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory, $id)
    {
        $subcategory = $subcategory->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:20|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome tem de ter no maximo 15 caracteres',
            'name.unique' => 'A categoria que quer cadastrar já existe',
            'description.required' => 'O campo descrição é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório',
        ]);

        $updated = $subcategory->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
        ]);

        if ($updated) {
            return redirect()->route('admin.subcategories')->with('success', 'Categoria atualizada com sucesso!');
        } else {
            return redirect()->route('admin.subcategories')->with('error', 'Ocorreu um erro ao tentar atualizar a categoria tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, SubCategory $subcategory)
    {
        $subcategory = $subcategory->findOrFail($id);

        try {
            $subcategory->delete();
            return redirect()->route('admin.subcategories')->with('success', 'Subcategoria deletada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.subcategories')->with('error', 'Erro ao deletar a Subcategoria.');
        }
    }
}
