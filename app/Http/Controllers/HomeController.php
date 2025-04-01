<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Category $category, SubCategory $subcategory, Product $product, Brand $brand)
    {
        $categories = $category->all();
        $brands = $brand->all();
        $subcategories = $subcategory->all();
        $destaques = $product->inRandomOrder()->take(8)->get();
        $especiais = $product->inRandomOrder()->take(3)->get();
        $notbookSansung = $product->where('id', '=', 11)->first();
        $escutadorPromo = $product->where('id', '=', 10)->first();
        $recentProducts = $product->latest()->take(3)->get();
        $randomProducts1 = $product->inRandomOrder()->take(3)->get();
        $randomProducts2 = $product->inRandomOrder()->take(3)->get();

        return view('site.home', compact('categories', 'subcategories', 'destaques', 'especiais', 'notbookSansung', 'escutadorPromo', 'brands', 'recentProducts', 'randomProducts1', 'randomProducts2'));
    }

}
