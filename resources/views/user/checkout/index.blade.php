    <div class="container my-8">
        <h1 class="text-4xl font-bold text-center mb-6">Checkout</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="cart-items">
            <h2 class="text-2xl font-semibold mb-4">Your Items</h2>

            <table class="min-w-full bg-white border border-gray-200 mb-6">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b">Product</th>
                        <th class="py-3 px-4 border-b">Price</th>
                        <th class="py-3 px-4 border-b">Quantity</th>
                        <th class="py-3 px-4 border-b">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="py-4 px-4 border-b">{{ $item->merchandise->name }}</td>
                            <td class="py-4 px-4 border-b">Rp{{ number_format($item->merchandise->price, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-4 px-4 border-b">Rp{{ number_format($item->merchandise->price * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between mb-6">
                <span class="text-xl font-semibold">Total: Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="address" class="block text-lg font-medium">Shipping Address</label>
                    <input type="text" id="address" name="address" class="w-full border border-gray-300 p-3 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="payment_method" class="block text-lg font-medium">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="w-full border border-gray-300 p-3 rounded-md" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>

                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md">Complete Checkout</button>
            </form>
        </div>
    </div>

