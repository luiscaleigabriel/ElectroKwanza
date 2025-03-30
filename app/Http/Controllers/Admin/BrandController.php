<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand, Request $request)
    {
        $search = $request->input('search');

        $brands = $brand->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ], [
            'name.required' => 'O nome é obrigatória.',
            'image.required' => 'A imagem é obrigatória.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'name.unique' => 'O nome da marca já existe ',
            'image.max' => 'A imagem não pode exceder 4MB.',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('brands', 'public');
        }

        $slug = Str::slug($request->input('name'));

        $created = $brand->create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $path,
        ]);

        if ($created) {
            return redirect()->route('admin.brands')->with('success', 'Marca criada com sucesso!');
        } else {
            return redirect()->route('admin.brands')->with('error', 'Ocorreu um erro ao tentar criar a marca tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Brand $brand)
    {
        $brand = $brand->findOrFail($id);
        return response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
