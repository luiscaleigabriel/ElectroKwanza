<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
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
