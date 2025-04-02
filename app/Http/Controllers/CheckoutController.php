<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Category $category, SubCategory $subcategory) 
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('site.checkout', compact('categories', 'subcategories'));
    }
}
