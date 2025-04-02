<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('site.pay', compact('categories', 'subcategories'));
    }

    public function visa()
    {

    }

    public function unitelMoney(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'unitel_number' => 'required|regex:/^9[0-9]{8}$/',
            'unitel_pin' => 'required|digits:4',
        ], [
            'unitel_number.required' => 'Informe o número de telefone',
            'unitel_number.regex' => 'O número de telefone deve começar com 9 e ter 9 dígitos.',
            'unitel_pin.required' => 'Informe o pin Unitel Money',
            'unitel_pin.digits' => 'O pin deve conter exatamente 4 digitos',
        ]);

        // PINs válidos para simulação
        $validPins = ['1234', '0000', '4321'];

        if (!in_array($request->unitel_pin, $validPins)) {
            return back()->with('error', 'PIN incorreto.'); //PINs de teste: 1234, 0000 ou 4321
        }

        // Obter total do carrinho
        $amountToPay = Cart::total(0, '', '');

        // Simulação de saldo suficiente
        $simulatedBalance = 1000000; // Saldo fictício em Kz

        if ($simulatedBalance < $amountToPay) {
            return back()->with('error', 'Saldo insuficiente na conta Unitel Money');
        }

        // Simulação de processamento bem-sucedido
        $transactionId = 'SIM' . time(); // ID de transação simulado

        // Limpar o carrinho após pagamento
        Cart::destroy();

        // Redirecionar para página de sucesso com dados simulados
        return redirect()->route('payment.success')->with([
            'success' => 'Pagamento realizado com sucesso via Unitel Money',
            'transaction_id' => $transactionId,
            'amount' => number_format($amountToPay, 2, ',', '.') . ' Kz',
            'phone_number' => $request->unitel_number,
            'cart_content' => 'O seu carrinho foi limpo após o pagamento.'
        ]);

    }

}
