<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

class ContactController extends Controller
{
    public function index(Category $category, SubCategory $subcategory) 
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();
        return view('site.contact', compact('categories' ,'subcategories'));
    }
}
