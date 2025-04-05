<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Category $category, SubCategory $subcategory, User $user)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        $user = $user->find(Auth::user()->id);

        return view('user.index', compact('categories', 'subcategories', 'user'));
    }

    public function update()
    {
        
    }
}
