<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

        // Armazenar dados na sessão
        session([
            'checkout_data' => [
                'customer' => [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'phone' => $request->phone
                ],
                'shipping' => [
                    'option' => $request->shipping_option,
                    'cost' => $shippingCost
                ],
                'cart_total' => Cart::total(0, '', ''),
                'grand_total' => Cart::total(0, '', '') + $shippingCost
            ]
        ]);

        // Redirecionar para seleção de método de pagamento
        return redirect()->route('payment.method');
    }
}
