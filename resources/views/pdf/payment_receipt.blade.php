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
    <h2>Comprovante de Pagamento</h2>
    <p><strong>Número de Telefone:</strong> {{ $payment->phone_number }}</p>
    <p><strong>Valor:</strong> {{ $payment->amount }} Kz</p>
    <p><strong>Status:</strong> {{ $payment->status }}</p>
    <p><strong>Data de Criação:</strong> {{ $payment->created_at }}</p>
</body>

</html>
