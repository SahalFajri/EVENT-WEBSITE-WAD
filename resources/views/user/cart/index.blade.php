<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title> Cart | MelodyMania</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-navbar-user />
  <main class="pt-28 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Header Cart -->
      <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Cart</h1>
        <p class="text-lg text-black">Periksa barang yang Anda pilih sebelum melanjutkan ke pembayaran.</p>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="{{ route('user.merchandise.index') }}" class="absolute top-0 right-0 mt-2 mr-4 text-gray-600 hover:text-gray-800 flex items-center space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          <span>Back</span>
        </a>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Product name</th>
              <th scope="col" class="px-6 py-3">Item Quantity</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Sub Total</th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Remove</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($cartItems as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $item->merchandise->name }}
              </th>
              <td class="px-6 py-4">
                {{ $item->quantity }}
              </td>
              <td class="px-6 py-4">
                Rp{{ number_format($item->merchandise->price, 0, ',', '.') }}
              </td>
              <td class="px-6 py-4">
                Rp{{ number_format($item->merchandise->price * $item->quantity, 0, ',', '.') }}
              </td>
              <td class="px-6 py-4 text-right">
                <!-- Form Remove with SweetAlert2 Confirmation -->
                <form action="{{ route('cart.remove', $item->id) }}" method="POST" id="remove-form-{{ $item->id }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="text-red-600" onclick="confirmRemove({{ $item->id }})">
                    Remove
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5">Your cart is empty.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <form action="{{ route('checkout.store') }}" method="GET">
        @csrf
        <button type="submit" class="w-full bg-blue-600 text-white px-8 py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 ">
        Proceed to Checkout
        </button>
        </form>

    </div>
  </main>
  <x-footer-user />

  <!-- SweetAlert2 -->
  <script>
    function confirmRemove(itemId) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Item ini akan dihapus dari keranjang!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form to remove the item
          document.getElementById('remove-form-' + itemId).submit();
        }
      });
    }
  </script>
</body>

</html>
