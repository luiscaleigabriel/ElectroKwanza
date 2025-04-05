<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.5;
            font-size: 14px;
            padding: 30px;
        }
        .header {
            background-color: #0a58ca;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
        .order-details {
            margin-top: 20px;
        }
        .order-table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-table th, .order-table td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        .order-table th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Confirmação de Compra - Pedido #{{ $order->id }}</h2>
    </div>

    <p>Olá, {{ $user->firstname . ' ' . $user->lastname }}!</p>
    <p>Obrigado por sua compra na nossa loja! Abaixo estão os detalhes do seu pedido:</p>

    <div class="order-details">
        <div class="section-title">Detalhes do Pedido</div>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2, ',', '.') }} Kz</td>
                        <td>{{ number_format($item->price * $item->quantity, 2, ',', '.') }} Kz</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total Pago: {{ number_format($order->total_price, 2, ',', '.') }} Kz
        </div>
    </div>

    <p>Se você tiver alguma dúvida, entre em contato conosco.</p>
    <p>Atenciosamente,</p>
    <p>A equipe da ElectroKwanza</p>
</body>
</html>
