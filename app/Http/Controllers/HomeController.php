<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Category $category, SubCategory $subcategory, Product $product)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        $destaques = $product->paginate(8);

        return view('site.home', compact('categories', 'subcategories', 'destaques'));
    }

    public function loja(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        return view('site.home', compact('categories', 'subcategories'));
    }
}
