<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <a href="{{ route('user.ticket.index') }}" class="text-primary-800 hover:underline mb-4 inline-block">← Back to
    Tickets</a>
  <h1 class="text-3xl font-bold mb-4">Ticket Details</h1>
  <div class="mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <div class="flex flex-col md:flex-row gap-4">
      <img class="object-cover h-full rounded-lg"
        src="https://i.pinimg.com/originals/45/35/65/4535650015b7608dce2f8e36a42785eb.jpg" alt="Ticket Image">
      <div class="flex flex-col">
        <div>
          <h2 class="text-2xl font-semibold mb-2">Ticket Name</h2>
          <p class="text-gray-700 mb-4">Event Date: 21 Jan</p>
          <p class="text-gray-700 mb-4">Price: Rp100.000</p>
          <p class="text-gray-700 mb-4">Description: Join us for an unforgettable event experience. Enjoy live music,
            great food, and a vibrant atmosphere. Don't miss out on this amazing event!</p>
        </div>
        <form action="#" method="POST" class="mt-4">
          @csrf
          <div class="flex items-center mb-4">
            <label for="quantity" class="block text-gray-700 font-medium mr-2">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1"
              class="w-20 p-2 border border-gray-300 rounded-lg">
          </div>
          <button type="submit"
            class="w-full bg-primary-800 text-white py-2 px-4 rounded-lg hover:bg-primary-900">Purchase</button>
        </form>
      </div>
    </div>
  </div>
</x-layout-user>
