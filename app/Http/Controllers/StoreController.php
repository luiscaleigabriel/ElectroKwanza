<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Category $category, SubCategory $subcategory, Product $product, Request $request, $slug = null)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        $search = $request->input('search');

        
        $products = $product->paginate(10);

        if ($search) {
            $products = $product->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('subcategory', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('brand', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            })->paginate(10);
        } elseif ($slug) {
            $products = $product->when($search, function ($query, $slug) {
                return $query->where('name', 'like', "%{$slug}%")
                    ->orWhere('slug', 'like', "%{$slug}%")
                    ->orWhere('description', 'LIKE', "%{$slug}%")
                    ->orWhereHas('category', function ($q) use ($slug) {
                        $q->where('name', 'LIKE', "%{$slug}%");
                    })
                    ->orWhereHas('subcategory', function ($q) use ($slug) {
                        $q->where('name', 'LIKE', "%{$slug}%");
                    })
                    ->orWhereHas('brand', function ($q) use ($slug) {
                        $q->where('name', 'LIKE', "%{$slug}%");
                    });
            })->paginate(10);
        }

        return view('site.store', compact('categories', 'subcategories', 'products'));
    }
}
