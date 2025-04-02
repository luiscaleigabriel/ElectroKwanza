<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function visa()
    {

    }

    public function unitelMoney(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'unitel_number' => 'required|regex:/^9[0-9]{8}$/',
            'unitel_pin' => 'required|digits:4',
        ], [
            'unitel_number.required' => 'Informe o número de telefone',
            'unitel_number.regex' => 'Informe um número válido',
            'unitel_pin.required' => 'Informe o pin Unitel Money',
            'unitel_pin.digits' => 'O pin deve conter 4 digitos',
        ]);

        // Configurações da API (sandbox)
        $apiKey = config('services.appypay.api_key');
        $merchantId = config('services.appypay.merchant_id');
        $secretKey = config('services.appypay.secret_key');
        $apiUrl = config('services.appypay.sandbox_url');

        // Dados do pedido (substitua com seus dados reais)
        $orderData = [
            'merchant_reference' => 'ORDER_' . uniqid(),
            'amount' => session('cart_total'), // Valor total do carrinho
            'currency' => 'AOA',
            'customer_msisdn' => $validated['unitel_number'],
            'callback_url' => route('payment.callback'), // Rota de callback
            'description' => 'Compra no ' . config('app.name'),
            'metadata' => [
                'order_id' => session('order_id'),
                'user_id' => auth()->id()
            ]
        ];

        try {
            // Assinar a requisição
            $signature = hash_hmac('sha256', json_encode($orderData), $secretKey);

            // Fazer a requisição para a API da AppyPay
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
                'X-Signature' => $signature
            ])->post($apiUrl . '/api/v1/payments/create', $orderData);

            $responseData = $response->json();

            if ($response->successful() && $responseData['status'] === 'success') {
                // Redirecionar para a página de pagamento da AppyPay
                return redirect()->away($responseData['payment_url']);
            } else {
                return back()->withErrors(['msg' => $responseData['message'] ?? 'Erro no processamento do pagamento']);
            }

        } catch (\Exception $e) {
            Log::error('Erro no pagamento Unitel Money: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Ocorreu um erro ao processar seu pagamento. Tente novamente.']);
        }

    }

    public function handleCallback(Request $request)
    {
        // Valide a assinatura
        $receivedSignature = $request->header('X-Signature');
        $payload = $request->getContent();
        $expectedSignature = hash_hmac('sha256', $payload, config('services.appypay.secret_key'));

        if (!hash_equals($expectedSignature, $receivedSignature)) {
            Log::error('Assinatura inválida no callback: ' . $payload);
            abort(403);
        }

        $data = $request->all();

        // Processar o status do pagamento
        if ($data['status'] === 'completed') {
            // Atualize o pedido como pago
            $order = Order::find($data['metadata']['order_id']);
            if ($order) {
                $order->update([
                    'payment_status' => 'paid',
                    'transaction_id' => $data['transaction_id']
                ]);

                // Enviar e-mail de confirmação, etc.
            }
        }

        return response()->json(['status' => 'success']);
    }
}
