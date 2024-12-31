<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>

  <!-- Header Artikel -->
  <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Gallery Event</h1>
      <p class="text-lg text-black">Lihat kumpulan foto dari berbagai event yang pernah terlaksana</p>
    </div>

  <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($galleries as $gallery)
    <div>
        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->image_alt }}">
    </div>      
    @endforeach
    
</div>

</x-layout-user>

