<x-layout-admin>
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order Details</h2>
        <div class="mt-6">
          <div class="divide-y divide-gray-200 dark:divide-gray-700">
            <div class="flex flex-wrap items-center gap-y-4 py-6">
              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $order->order_number }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $order->created_at->format('d.m.Y') }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">${{ number_format($order->total_price, 2) }}</dd>
              </dl>

              <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                  @if($order->status === 'pre-order')
                  <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                  </svg>
                  Pre-order
                  @endif
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="mt-6">
          <a href="{{ route('order-merchandise.index') }}" class="inline-block rounded-lg bg-primary-700 px-4 py-2 text-white">Back to Orders</a>
        </div>
      </div>
    </div>
  </section>
</x-layout-admin>
