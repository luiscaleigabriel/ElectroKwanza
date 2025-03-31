<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        $search = $request->input('search');

        $products = $product->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('stock', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, SubCategory $subcategory, Brand $brand)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        $brands = $brand->all();

        return view('admin.products.create_edit', compact('categories', 'subcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ], [
            'name.required' => 'O nome do produto é obrigatória.',
            'price.required' => 'O preço do produto é obrigatória.',
            'price.numeric' => 'Informe um valor válido para o preço do produto.',
            'stock.required' => 'A quantidade em stock é obrigatória.',
            'stock.integer' => 'A quantidade deve ser um número inteiro.',
            'description.required' => 'A descrição do produto é obrigatória.',
            'category_id.required' => 'A categoria é obrigatória.',
            'subcategory_id.required' => 'A subcategoria é obrigatória.',
            'brand_id.required' => 'A marca do produto é obrigatória.',
            'image1.required' => 'A imagem é obrigatória.',
            'image1.image' => 'O arquivo deve ser uma imagem.',
            'image1.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image1.max' => 'A imagem não pode exceder 4MB.',
            'image2.image' => 'O arquivo deve ser uma imagem.',
            'image2.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image2.max' => 'A imagem não pode exceder 4MB.',
            'image3.image' => 'O arquivo deve ser uma imagem.',
            'image3.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image3.max' => 'A imagem não pode exceder 4MB.',
        ]);

        if ($request->hasFile('image1')) {
            $path_p = $request->file('image1')->store('products', 'public');
        }

        if ($request->hasFile('image2')) {
            $path_s = $request->file('image2')->store('products', 'public');
        }

        if ($request->hasFile('image3')) {
            $path_t = $request->file('image3')->store('products', 'public');
        }

        $slug = Str::slug($request->input('name'));

        $created = $product->create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'image1' => $path_p,
            'image2' => $path_s ?? null,
            'image3' => $path_t ?? null,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        if ($created) {
            return redirect()->route('admin.products')->with('success', 'Produto criado com sucesso!');
        } else {
            return redirect()->route('admin.products')->with('error', 'Ocorreu um erro ao tentar criar o prodto tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Product $product)
    {
        $product = $product->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $product, Category $category, SubCategory $subcategory, Brand $brand)
    {
        $product = $product->findOrFail($id);
        $categories = $category->all();
        $subcategories = $subcategory->all();
        $brands = $brand->all();

        return view('admin.products.create_edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = $product->findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ], [
            'name.required' => 'O nome do produto é obrigatória.',
            'price.required' => 'O preço do produto é obrigatória.',
            'price.numeric' => 'Informe um valor válido para o preço do produto.',
            'stock.required' => 'A quantidade em stock é obrigatória.',
            'stock.integer' => 'A quantidade deve ser um número inteiro.',
            'description.required' => 'A descrição do produto é obrigatória.',
            'category_id.required' => 'A categoria é obrigatória.',
            'subcategory_id.required' => 'A subcategoria é obrigatória.',
            'brand_id.required' => 'A marca do produto é obrigatória.',
            'image1.required' => 'A imagem é obrigatória.',
            'image1.image' => 'O arquivo deve ser uma imagem.',
            'image1.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image1.max' => 'A imagem não pode exceder 4MB.',
            'image2.image' => 'O arquivo deve ser uma imagem.',
            'image2.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image2.max' => 'A imagem não pode exceder 4MB.',
            'image3.image' => 'O arquivo deve ser uma imagem.',
            'image3.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif ou svg.',
            'image3.max' => 'A imagem não pode exceder 4MB.',
        ]);

        $slug = Str::slug($request->input('name'));

        $data = [
            'name' => $request->input('name'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'brand_id' => $request->input('brand_id'),
        ];

        if ($request->hasFile('image1')) {
            // Remove a imagem antiga se existir
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Armazena a nova imagem
            $data['image1'] = $request->file('image1')->store('products','public');
        }

        if ($request->hasFile('image2')) {
            // Remove a imagem antiga se existir
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Armazena a nova imagem
            $data['image2'] = $request->file('image2')->store('products','public');
        }

        if ($request->hasFile('image3')) {
            // Remove a imagem antiga se existir
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Armazena a nova imagem
            $data['image3'] = $request->file('image3')->store('products','public');
        }

        $updated = $product->update($data);

        if ($updated) {
            return redirect()->route('admin.products')->with('success', 'Produto atualizado com sucesso!');
        } else {
            return redirect()->route('admin.products')->with('error', 'Ocorreu um erro ao tentar atualizar o produto, tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Product $product)
    {
        $product = $product->findOrFail($id);

        if ($product->image1 && Storage::disk('public')->exists($product->image1)) {
            Storage::disk('public')->delete($product->image1);
        }

        if ($product->image2 && Storage::disk('public')->exists($product->image2)) {
            Storage::disk('public')->delete($product->image2);
        }

        if ($product->image3 && Storage::disk('public')->exists($product->image3)) {
            Storage::disk('public')->delete($product->image3);
        }

        try {
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Produto deletada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.products')->with('error', 'Erro ao deletar o produto.');
        }
    }
}
