<x-layout-admin>
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <!-- Header -->
        <div class="gap-4 sm:flex sm:items-center sm:justify-between">
          <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">My orders</h2>

          <!-- Filters -->
          <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
            <div>
              <label for="order-type" class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Select order type</label>
              <select id="order-type" class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                <option value="all orders" selected>All orders</option>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Orders List -->
        <div class="mt-6 flow-root sm:mt-8">
          <div id="orders-list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <!-- Sample Order -->
            @foreach($order as $item)
            <div class="flex flex-wrap items-center gap-y-4 py-6">
              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $item->id }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $item->created_at->format('d.m.Y') }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">Rp{{ number_format($item->total, 2) }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                <dd class="me-2 mt-1.5 inline-flex items-center rounded px-2.5 py-0.5 text-xs font-medium 
                  @if($item->status === 'Paid') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                  @elseif($item->status === 'Pending') bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300
                  @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300
                  @endif">
                  {{ ucfirst($item->status) }}
                </dd>
              </dl>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const orderTypeSelect = document.getElementById("order-type");
      const ordersList = document.getElementById("orders-list");

      // Simpan daftar asli
      const originalOrders = Array.from(ordersList.children);

      // Fungsi untuk menyaring pesanan
      const filterOrders = () => {
        const selectedType = orderTypeSelect.value.toLowerCase();

        // Bersihkan daftar saat ini
        ordersList.innerHTML = "";

        // Jika "All orders" dipilih, tampilkan semua pesanan
        if (selectedType === "all orders") {
          originalOrders.forEach(order => ordersList.appendChild(order));
          return;
        }

        // Filter pesanan berdasarkan status
        const filteredOrders = originalOrders.filter(order => {
          const status = order.querySelector("dl:last-child dd").textContent.trim().toLowerCase();
          return status === selectedType;
        });

        // Tampilkan hasil filter
        filteredOrders.forEach(order => ordersList.appendChild(order));
      };

      // Event listener untuk dropdown
      orderTypeSelect.addEventListener("change", filterOrders);
    });
  </script>
</x-layout-admin>
