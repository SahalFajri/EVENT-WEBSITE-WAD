<x-layout-admin>
  <x-slot:title>Order Details</x-slot:title>
  <div class="mx-auto p-6 bg-white rounded-lg shadow-md mt-10 w-fit">
    <h1 class="text-3xl text-center font-bold mb-4">Order Details</h1>
    <div class="flex flex-col gap-4">
      <div>
        <h2 class="text-2xl font-semibold mb-2">Order ID: {{ $order->id }}</h2>
        <p class="text-gray-700 mb-4">Status: {{ $order->status }}</p>
        <p class="text-gray-700 mb-4">Total Amount: Rp{{ number_format($order->gross_amount, 0, ',', '.') }}</p>
        <p class="text-gray-700 mb-4">Notes: {{ $order->notes }}</p>
      </div>
      <div>
        <h3 class="text-xl font-semibold mb-2">Order Items</h3>
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Item Name</th>
              <th scope="col" class="px-6 py-3">Quantity</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order->details as $detail)
              <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $detail->ticket->name }}</td>
                <td class="px-6 py-4">{{ $detail->quantity }}</td>
                <td class="px-6 py-4">Rp{{ number_format($detail->price, 0, ',', '.') }}</td>
                <td class="px-6 py-4">Rp{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @if ($order->status == 'PENDING')
          <a href="{{ route('checkout.show', $order->id) }}"
            class="w-full bg-alt block text-center mt-3 text-white py-2 px-4 rounded-lg">Confirm Payment</a>
        @endif
        @if ($order->status == 'PAID')
          <a href="{{ route('dashboard.order-ticket.download_pdf_order', $order->id) }}" target="_blank"
            class="w-full bg-alt block text-center mt-3 text-white py-2 px-4 rounded-lg">Download Invoice</a>
        @endif
      </div>
    </div>
  </div>
</x-layout-admin>
