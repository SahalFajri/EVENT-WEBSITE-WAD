<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" 
  src="https://app.sandbox.midtrans.com/snap/snap.js" 
  data-client-key="{{ config('midtrans.client_key') }}"></script>

  <title> Checkout | MelodyMania</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

  <x-navbar-user />   
   


  <main class="pt-28 bg-gray-50">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
   
      
   <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Pembayaran</h1>
        <p class="text-lg text-black">Silakan pilih metode pembayaran untuk melanjutkan.</p>
    </div>


<div class="flex items-center justify-center bg-gray-0">
<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
<h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Total Pembayaran</h5>
<div class="flex items-baseline text-gray-900 dark:text-white">
<span class="text-5xl font-extrabold tracking-tight">Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
</div>
<ul role="list" class="space-y-5 my-7">
<li class="flex items-center">
<svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</svg>
<span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Qris</span>
</li>
<li class="flex">
<svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</svg>
<span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Gopay</span>
</li>
<li class="flex">
<svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</svg>
<span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Dana</span>
</li>
<li class="flex line-through decoration-gray-500">
<svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</svg>
<span class="text-base font-normal leading-tight text-gray-500 ms-3">Pay Later</span>
</li>
<li class="flex line-through decoration-gray-500">
<svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</svg>
<span class="text-base font-normal leading-tight text-gray-500 ms-3">Credit Card</span>
</li>
<li class="flex line-through decoration-gray-500">
</ul>
<div id="payment-form">
        <button id="pay-button" class="bg-blue-600 text-white px-6 py-2 rounded-md">Bayar Sekarang</button>
    </div>
</div>





</main>
</div>
</body>

</html>
<x-footer-user />

<script type="text/javascript">
document.getElementById('pay-button').onclick = function () {
    snap.pay("{{ $snapToken }}", {
        onSuccess: function (result) {
            // Menampilkan SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil!',
                text: 'Terima kasih atas pembayaran Anda. Anda akan diarahkan ke halaman invoice.',
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                var orderId = "{{ $order->id }}";
                window.location.href = "{{ route('user.invoice', '') }}/" + orderId;
            });
        },
        onPending: function (result) {
            alert("Pembayaran pending.");
            window.location.href = "{{ route('checkout.pending') }}";
        },
        onError: function (result) {
            alert("Pembayaran gagal.");
            window.location.href = "{{ route('checkout.error') }}";
        }
    });
};

</script>