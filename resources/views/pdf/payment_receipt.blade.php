</html>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Comprovante de Pagamento</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.5;
            font-size: 14px;
            padding: 30px;
        }

        .header {
            border-bottom: 2px solid #0a58ca;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #0a58ca;
        }

        .header p {
            margin: 0;
            font-size: 12px;
            color: #666;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0a58ca;
        }

        .info,
        .details {
            margin-bottom: 20px;
        }

        .info-table,
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td,
        .details-table th,
        .details-table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .details-table th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-size: 16px;
            margin-top: 10px;
            color: #0a58ca;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>ElectroKwanza</h2>
        <p>Comprovante de Pagamento</p>
    </div>

    <div class="info">
        <div class="section-title">Informações do Cliente</div>
        <table class="info-table">
            <tr>
                <td><strong>Nome:</strong> {{ $user->firstname . ' ' . $user->lastname }}</td>
                <td><strong>Email:</strong> {{ $user->email }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Data:</strong>
                    {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="details">
        <div class="details">
            <div class="section-title">Produtos Comprados</div>
            <table class="details-table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Qtd</th>
                        <th>Preço Unit.</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['unit_price'], 2, ',', '.') }} Kz</td>
                            <td>{{ number_format($item['subtotal'], 2, ',', '.') }} Kz</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="section-title">Detalhes do Pagamento mm</div>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Referência</th>
                    <th>Método de Pagamento</th>
                    <th>Estado</th>
                    <th>SubTotal</th>
                    <th>Entrega</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Str::limit(Hash::make($payment->order_id), 6, ' ') }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>{{ number_format($payment->amount - $order->ship, 2, ',', '.') }} Kz</td>
                    <td>
                        @if ($order->total_price > 100000)
                            Grátis
                        @elseif ($order->ship > 0)
                            {{ number_format($order->ship, 2, ',', '.') }} Kz
                        @else
                            Não Pago
                        @endif
                    </td>
                    <td>{{ number_format($payment->amount, 2, ',', '.') }} Kz</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total Pago: <strong>{{ number_format($payment->amount, 2, ',', '.') }} Kz</strong>
        </div>
    </div>

    <div class="footer">
        Obrigado por comprar na ElectroKwanza. Este é o seu comprovante oficial de pagamento.
    </div>

</body>

</html>
