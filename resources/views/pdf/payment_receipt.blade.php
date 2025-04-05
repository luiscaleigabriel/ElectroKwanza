<!DOCTYPE html>
<html>

<head>
    <title>Comprovante de Pagamento</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h1>ElectroKwanza</h1>
    <br> <br>
    <h2>Comprovante de Pagamento</h2>
    <p><strong>Nome do Cliente:</strong> {{ $user->firstname . ' ' . $user->lastname }}</p>
    <p><strong>Metodo de pagamento:</strong> {{ $user->payment_method }}</p>
    <p><strong>Valor Total:</strong> {{ number_format($payment->amount, 2, '.', ',') }} Kz</p>
    <p><strong>Compra Finaliza em:</strong> {{ $payment->created_at }}</p>
    <br>
    <p><strong>Emitiido por:</strong> &copy;ElectroKwanza - Em {{ date('d/m/Y h:m:s') }}</p>
</body>

</html>
