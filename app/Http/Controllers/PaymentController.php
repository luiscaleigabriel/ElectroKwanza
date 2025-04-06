<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index(Category $category, SubCategory $subcategory)
    {
        $categories = $category->all();
        $subcategories = $subcategory->all();

        return view('site.pay', compact('categories', 'subcategories'));
    }

    public function visa() {}

    public function unitelMoney(Request $request)
    {
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
            return back()->with('error', 'PIN incorreto.');
        }

        $amountToPay = Cart::total(0, '', '');

        // Simulação de saldo suficiente
        $simulatedBalance = 1000000; // Saldo fictício em Kz

        if ($simulatedBalance < $amountToPay) {
            return back()->with('error', 'Saldo insuficiente na conta Unitel Money');
        }

        // Usar transação para garantir integridade dos dados
        DB::beginTransaction();

        $ship = 0;

        if($amountToPay > 100000) {
            $ship = 0;
        }elseif(session('ship') > 0) {
            $ship = session('ship');
        }else {
            $ship = 1;
        }

        try {
            // Criar o pedido
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => Cart::content()->sum(function ($item) {
                    return $item->price * $item->qty;
                }) + $ship,
                'status' => 'Finalizada',
                'ship' => $ship
            ]);

            // Adicionar itens do carrinho ao pedido
            foreach (Cart::content() as $cartItem) {
                $product = Product::findOrFail($cartItem->id);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cartItem->qty,
                    'price' => $cartItem->price,
                ]);

                // Atualizar estoque
                $product->decrement('stock', $cartItem->qty);
            }

            // Armazenando dados do pagamento
            Payment::create([
                'order_id' => $order->id,
                'amount' => Cart::content()->sum(function ($item) {
                    return $item->price * $item->qty;
                }) + $ship,
                'payment_method' => 'Unitel Money',
                'status' => 'Comprado',
            ]);

            DB::commit();

            // Limpar carrinho e sessão
            Cart::destroy();

            // Enviar e-mail de confirmação
            // Mail::to(Auth::user()->email)->send(new OrderConfirmation($order, Auth::user()));

            return redirect()->route('customer.orders')->with('success', 'Compra finalizada com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erro ao processar pedido. Por favor tente novamente!');
        }
    }

    public function generatePDF($paymentId)
    {
        $user = User::find(Auth::user()->id);
        $payment = Payment::where('order_id', '=', $paymentId)->first();
        $order = Order::find($paymentId);

        // Carregue todos os itens do pedido com os produtos relacionados
        $orderItems = OrderItem::with('product')->where('order_id', $order->id)->get();

        // Formate os itens já com os cálculos prontos
        $items = $orderItems->map(function ($item) {
            return [
                'name' => $item->product->name,
                'quantity' => $item->quantity,
                'unit_price' => $item->product->price,
                'subtotal' => $item->product->price * $item->quantity,
            ];
        });

        $pdf = PDF::loadView('pdf.payment_receipt', compact('payment', 'user', 'items', 'order'));

        return $pdf->download('comprovante_pagamento.pdf');
    }
}
