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
        $destaques = $product->paginate(8);
        $especiais = $product->paginate(3);
        $notbookSansung = $product->where('id', '=', 11)->first();
        $escutadorPromo = $product->where('id', '=', 10)->first();

        return view('site.home', compact('categories', 'subcategories', 'destaques', 'especiais', 'notbookSansung', 'escutadorPromo', 'brands'));
    }

    public function loja(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        return view('site.home', compact('categories', 'subcategories'));
    }
}
