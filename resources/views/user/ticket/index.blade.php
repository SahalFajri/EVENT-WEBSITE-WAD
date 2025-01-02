<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div>
    <div class="justify-center flex flex-col items-center">
      <img src="{{ asset('') }}" class="w-2/3" alt="">
    </div>

    <div class="flex flex-wrap justify-center gap-4 mt-8">
      @foreach ($tickets as $ticket)
        <a href="{{ $ticket->is_available ? route('user.ticket.show', $ticket->id) : '#' }}"
          class="flex justify-between overflow-hidden bg-white border rounded-lg shadow flex-row w-full md:w-[36%] transition-all duration-300 hover:shadow-xl hover:scale-105 {{ !$ticket->is_available ? 'bg-gray-300 cursor-not-allowed' : 'border-secondary-500' }}">
          <div class="flex flex-col justify-center w-1/3 leading-normal">
            <div class="text-center h-1/2 m-1">
              <h5
                class="bg-clip-text text-transparent {{ !$ticket->is_available ? 'bg-gray-300' : 'bg-alt' }} text-3xl font-bold tracking-tight">
                21</h5>
              <h5
                class="bg-clip-text text-transparent {{ !$ticket->is_available ? 'bg-gray-300' : 'bg-alt' }} text-2xl font-bold tracking-tight">
                Jan</h5>
            </div>
            <div class="{{ !$ticket->is_available ? 'bg-gray-300' : 'bg-alt' }} h-1/2 p-2">
              <p class="font-semibold text-white">{{ $ticket->name }}</p>
              <p class="font-light text-white">Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
            </div>
          </div>
          <img class="object-cover w-full rounded-e-lg h-36 {{ !$ticket->is_available ? 'grayscale' : '' }}"
            src="{{ asset('tickets/ticket-' . $loop->index + 1 . '.jpeg') }}" alt="">
        </a>
      @endforeach
    </div>
  </div>
</x-layout-user>
