<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('site.checkout', compact('categories', 'subcategories'));
    }

    public function initiateCheckout(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'shipping_option' => 'required|in:normal,express,pickup'
        ], [
            'firstname.required' => 'Este campo é obrigatório',
            'lastname.required' => 'Este campo é obrigatório',
            'email.required' => 'Este campo é obrigatório',
            'email.email' => 'Informe um email válido',
            'phone.required' => 'Este campo é obrigatório',
            'shipping_option.required' => 'Selecione a opção para entrega'
        ]);

        // Calcular custo de envio
        $shippingCost = 0;
        switch($request->shipping_option) {
            case 'normal':
                $shippingCost = 2500;
                break;
            case 'express':
                $shippingCost = 6000;
                break;
            case 'pickup':
                $shippingCost = 0;
                break;
        }

        // Armazenando dados da entrega na sessão
        session([
            'user_id' => Auth::user()->id,
            'ship' => $shippingCost,
            ]);

        return redirect()->route('payment.method');
    }
}
