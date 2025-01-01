<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="mx-auto p-6 bg-white rounded-lg shadow-md mt-10 w-fit">
    <a href="{{ route('user.ticket.index') }}" class="text-primary-800 hover:underline mb-4 inline-block">← Back to
      Tickets</a>
    <h1 class="text-3xl text-center font-bold mb-4">{{ $ticket->name }}</h1>
    <div class="flex flex-col sm:flex-row gap-4">
      <img class="object-cover h-96 max-w-80 rounded-lg"
        src="{{ $ticket->id == $tickets[0]->id ? asset('tickets/ticket-1.jpeg') : ($ticket->id == $tickets[1]->id ? asset('tickets/ticket-2.jpeg') : asset('tickets/ticket-3.jpeg')) }}"
        alt="Ticket Image">
      <div class="flex flex-col w-full sm:w-80">
        <div>
          <h2 class="text-2xl font-semibold mb-2">Rp{{ number_format($ticket->price, 0, ',', '.') }}</h2>
          <p class="text-gray-700 mb-4">Event Date: 21 Jan</p>
          <p class="text-gray-700 mb-4">{{ $ticket->description }}</p>
          <p class="text-gray-700 mb-4">Stock Available: {{ $ticket->stock }}</p>
        </div>
        <form action="#" method="POST" class="mt-4">
          @csrf
          <div class="flex items-center mb-4">
            <label for="quantity" class="block text-gray-700 font-medium mr-2">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1"
              max="{{ $ticket->stock >= 10 ? 10 : $ticket->stock }}" value="1"
              class="w-20 p-2 border border-gray-300 rounded-lg">
          </div>
          <button type="submit" class="w-full bg-alt text-white py-2 px-4 rounded-lg">Purchase</button>
        </form>
      </div>
    </div>
  </div>
</x-layout-user>
