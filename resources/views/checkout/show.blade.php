<x-layout-user>
  <x-slot:title>Payment Checkout</x-slot:title>

  <div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">Payment Checkout</h1>
  </div>

  <div class="mx-auto p-6 bg-white rounded-lg shadow-md mt-10 w-fit">
    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
      <div class="flex items-start justify-between">
        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Order ID: {{ $order->id }}</h2>
      </div>

      <div class="mt-8">
        <div class="flow-root">
          <ul role="list" class="-my-6 divide-y divide-gray-200">
            @foreach ($order->details as $detail)
              <li class="flex py-6">
                <div class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                  <img src="{{ $detail->item->image_url ?? asset('tickets/ticket-1.jpeg') }}"
                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                    class="size-full object-cover">
                </div>

                <div class="ml-4 flex flex-1 flex-col">
                  <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <h3>
                        <span class="font-semibold">{{ $detail->ticket->name }}</>
                      </h3>
                      <p class="ml-4">Rp{{ number_format($detail->price, 0, ',', '.') }}</p>
                    </div>
                  </div>
                  <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qty {{ $detail->quantity }}</p>

                    {{-- <div class="flex">
                      <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                    </div> --}}
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
      <div class="flex justify-between text-base font-medium text-gray-900">
        <p>Subtotal</p>
        <p>Rp{{ number_format($order->gross_amount, 0, ',', '.') }}</p>
      </div>
      <div class="mt-6">
        <form action=""></form>
        <button id="pay-button"
          class="flex items-center w-full justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Pay
          Now</button>
      </div>
    </div>
  </div>

  <script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function() {
      snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
          alert('Payment success!'); // Handle success
        },
        onPending: function(result) {
          alert('Waiting for your payment!'); // Handle pending
        },
        onError: function(result) {
          alert('Payment failed!'); // Handle error
        },
        onClose: function() {
          alert('You closed the popup without finishing the payment'); // Handle close
        }
      });
    });
  </script>
</x-layout-user>
