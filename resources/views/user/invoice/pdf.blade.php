<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $order->id }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Invoice #{{ $order->id }}</h1>
        <p>{{ $order->created_at->format('d M Y') }}</p>
    </div>
        
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Order Details</h2>
            <p>Order ID: <span class="font-bold">{{ $order->id }}</span></p>
            <p>Total Amount: <span class="font-bold text-blue-600">Rp{{ number_format($order->total, 2) }}</span></p>
            <p>Order Date: <span class="font-bold">{{ $order->created_at->format('d M Y') }}</span></p>
            <p>Status: <span class="font-bold text-green-600">{{ ucfirst($order->status) }}</span></p>
        </div>
        
        <hr class="my-4">
        <div>
            <h2 class="text-lg font-semibold">Customer Details</h2>
            <p>Name: <span class="font-bold">{{ Auth::user()->name }}</span></p>
            <p>Email: <span class="font-bold">{{ Auth::user()->email }}</span></p>
        </div>


    <h1><strong>Total: </strong>Rp{{ number_format($order->total, 2) }}</h1>
</body>
</html>
