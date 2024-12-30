<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="container mx-auto p-6">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
      {{-- <img src="{{ $artikel->gambar }}" alt="{{ $artikel->judul }}" class="w-full h-64 object-cover">
    
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $artikel->judul }}</h1>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $artikel->created_at->format('d M Y') }}
                </div>
    
                <p class="text-gray-600 mb-4">{{ $artikel->konten }}</p>
            </div> --}}
      <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="hihiuh"
        class="w-full h-64 object-cover">

      <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Lorem ipsum dolor sit amet.</h1>
        <div class="flex items-center text-sm text-gray-500 mb-4">
          <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          8 Mei 9999
        </div>

        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident soluta
          perspiciatis eum aliquid. Facere consectetur voluptates veniam quis deleniti, enim cupiditate veritatis ipsa
          nulla vero dignissimos! Labore nihil, eligendi, magnam facere velit enim tempora deserunt in neque delectus
          voluptas molestias ipsam quia fuga provident ipsum quod deleniti nisi iure accusamus voluptates nemo
          repellendus excepturi. Alias dignissimos quaerat ipsam eos nemo autem recusandae rerum, nisi tempore dolorem
          assumenda mollitia! In sequi, voluptatibus maxime modi dolorem quae non quos nam praesentium excepturi dolor,
          tempora amet ipsam quisquam. Aut praesentium rem voluptate eos sit reiciendis nulla, quae modi, eveniet
          incidunt, alias adipisci maiores.</p>

        <a href="/article"
          class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
          Back
        </a>
      </div>
    </article>
  </div>
</x-layout-user>
