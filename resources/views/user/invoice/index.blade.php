<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice #{{ $order->id }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
  <x-navbar-user />
    <main>
      <div>
      </div>
    </main>
    <main class="pt-28 bg-gray-50">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Invoice #{{ $order->id }}</h1>
        <p class="text-lg text-black">Silakan klik export invoice untuk mengunduh detail pembayaran</p>
    </div>
    

<ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Personal <span class="hidden sm:inline-flex sm:ms-2">Information</span>
        </span>
    </li>
    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Payment
        </span>
    </li>
    <li class="flex items-center">
        <span class="me-2">3</span>
        Invoice
    </li>
</ol>


<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 shadow-lg rounded-lg">
      
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Invoice</h1>
        
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

        <hr class="my-4">
        <div>
        <a href="{{ route('user.invoice.export', $order->id) }}" 
          class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
          Export Invoice
        </a>
        </div>
        
    </div>
    
</body>
</html>

</main>
<x-footer-user />


