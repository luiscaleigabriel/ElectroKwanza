<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details($id, Product $product, Category $category, SubCategory $subcategory)
    {
        $product = $product->findOrFail($id);
        $categories = $category->all();
        $subcategories = $subcategory->all();

        if($product) {
            return view('site.product', compact('product', 'categories', 'subcategories'));
        }

        return redirect()->back();
    }
}
