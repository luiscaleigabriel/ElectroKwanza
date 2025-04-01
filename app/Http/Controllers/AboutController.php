<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Category $category, SubCategory $subcategory) 
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        return view('site.about', compact('categories' ,'subcategories'));
    }
}
