<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('site.cart', compact('categories', 'subcategories'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity ?? 1,
            'price' => $product->price,
            'weight' => 0, // Adicione essa linha para evitar o erro.
            'options' => ['image' => $product->image1 ?? null]
        ]);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->quantity);
        return redirect()->route('cart.index')->with('success', 'Carrinho atualizado!');
    }

    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);

        return redirect()->back()->with('success', 'Quantidade aumentada com sucesso!');
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);

        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
            return redirect()->back()->with('success', 'Quantidade reduzida com sucesso!');
        }

        return redirect()->back()->with('error', 'A quantidade não pode ser menor que 1.');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Carrinho esvaziado!');
    }
}
