<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $order->id }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header-section {
            background-color: #2c6e8f;
            color: white;
            text-align: center;
            padding: 30px 0;
            border-radius: 8px 8px 0 0;
        }
        .header-section h1 {
            font-size: 3rem;
            margin: 0;
            letter-spacing: 2px;
        }
        .header-section p {
            font-size: 1.2rem;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            font-size: 2.5rem;
            color: #333;
        }
        .invoice-header p {
            font-size: 1rem;
            color: #666;
        }
        .invoice-details, .customer-details {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td,
        .customer-details th, .customer-details td {
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            text-align: left;
        }
        .invoice-details th, .customer-details th {
            background-color: #f7f7f7;
            color: #333;
        }
        .invoice-details td, .customer-details td {
            color: #555;
        }
        .highlight {
            font-weight: bold;
            color: #2c6e8f;
        }
        .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1d8c5f;
            text-align: right;
            margin-top: 20px;
        }
        .status {
            font-weight: bold;
            color: #28a745;
        }
        hr {
            border: 0;
            border-top: 2px solid #ddd;
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <div class="header-section">
        <h1>Melody Mania</h1>
        <p>Invoice pembayaran merchandise</p>
    </div>
    
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice #{{ $order->id }}</h1>
            <p>{{ $order->created_at->format('d M Y') }}</p>
        </div>
        
        <div class="order-details">
            <h2 class="text-lg font-semibold">Order Details</h2>
            <p>Order ID: <span class="highlight">{{ $order->id }}</span></p>
            <p>Total Amount: <span class="highlight">Rp{{ number_format($order->total, 2) }}</span></p>
            <p>Order Date: <span class="highlight">{{ $order->created_at->format('d M Y') }}</span></p>
            <p>Status: <span class="status">{{ ucfirst($order->status) }}</span></p>
        </div>
        
        <hr>
        
        <div class="customer-details">
            <h2 class="text-lg font-semibold">Customer Details</h2>
            <p>Name: <span class="highlight">{{ Auth::user()->name }}</span></p>
            <p>Email: <span class="highlight">{{ Auth::user()->email }}</span></p>
        </div>

        <div class="total-amount">
            <p><strong>Total:</strong> Rp{{ number_format($order->total, 2) }}</p>
        </div>
    </div>
</body>
</html>
