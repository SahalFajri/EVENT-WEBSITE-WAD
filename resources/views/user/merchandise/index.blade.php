<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Alert Section -->
    <!-- <div id="success-alert" class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg hidden" role="alert">
        <strong>Success!</strong> <span id="alert-message"></span>
    </div> -->

    <a href="/cart">
  <button type="button" class="fixed right-6 bottom-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" width="24" height="24">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
    </svg>
  </button>
</a>

    <!-- Header Merchandise -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Merchandise</h1>
        <p class="text-lg text-black">Beli merchandise yang super keren ini!</p>
    </div>
    <!-- Page start -->
    <div class="section padding-top-big">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($merchandise as $item)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->name }}
                                </h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $item->rating ? 'text-yellow-300' : 'text-gray-200 dark:text-gray-600' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ number_format($item->rating, 1) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                
                                <!-- Add to Cart Form -->
                                <form action="{{ route('cart.add', $item->id) }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button id="add-to-cart" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">No items available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- JavaScript for Dynamic Alert -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle success message from session
            @if(session('success'))
                const alertMessage = "{{ session('success') }}";
                const alertDiv = document.getElementById('success-alert');
                const alertText = document.getElementById('alert-message');
                
                alertText.textContent = alertMessage;
                alertDiv.classList.remove('hidden'); // Show alert
                
                // Hide alert after 5 seconds
                setTimeout(() => {
                    alertDiv.classList.add('hidden');
                }, 5000);
            @endif
        });
    </script> -->

    @if(session('success'))
    <script type="text/javascript">
        Swal.fire({
            title: 'Produk Ditambahkan!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6',
            timer: 3000
        });
    </script>
@endif


</x-layout-user>
