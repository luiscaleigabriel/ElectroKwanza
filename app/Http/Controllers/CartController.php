<?php

namespace App\Http\Controllers;

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
            'qty' => $request->quantity,
            'price' => $product->price,
            'options' => ['image' => $product->image ?? null]
        ]);

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->quantity);
        return redirect()->route('cart.index')->with('success', 'Carrinho atualizado!');
    }

    public function remove(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Carrinho esvaziado!');
    }
}
