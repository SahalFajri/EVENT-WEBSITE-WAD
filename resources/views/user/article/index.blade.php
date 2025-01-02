<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>

  <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-50 tracking-tight">
    Artikel & Berita Terbaru
</h1>
<p class="mt-4 text-lg text-gray-700 hover:text-primary-500 transition-colors">Temukan informasi terkini seputar event dan kegiatan kami.</p>


    <!-- Carousel -->
    <div id="default-carousel" class="relative w-full mb-12" data-carousel="slide">
      <div class="relative h-72 overflow-hidden rounded-xl shadow-lg md:h-[400px]">
          @foreach(['carousel-1.jpg', 'carousel-2.jpg', 'carousel-3.jpg', 'carousel-4.jpg', 'carousel-5.jpg'] as $image)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="{{ asset('carousels/' . $image) }}" 
                  class="absolute block w-full h-full object-cover" alt="Carousel Image">
            </div>
          @endforeach
      </div>
      <!-- Indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
          @for ($i = 0; $i < 5; $i++)
            <button type="button" class="w-3 h-3 rounded-full bg-primary-500 hover:bg-indigo-700 transition-colors duration-300" data-carousel-slide-to="{{ $i }}"></button>
          @endfor
      </div>     
      <!-- Controls -->
      <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 text-gray-600 bg-gray-50/80 rounded-r-lg group hover:bg-gray-200" data-carousel-prev>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
      </button>
      <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 text-gray-600 bg-gray-50/80 rounded-l-lg group hover:bg-gray-200"
              data-carousel-next>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19l7-7-7-7" />
          </svg>
      </button>
    </div>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach ($articles as $article)
      <article class="{{ $loop->index % 6 == 0 ? 'sm:col-span-2 sm:row-span-2' : 'col-span-1' }} bg-gradient-to-br from-white via-indigo-50 to-white border border-gray-200 rounded-lg shadow-xl transform transition-all hover:shadow-xl hover:scale-105 hover:translate-y-2">
          <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}"
             class="w-full h-{{ $loop->index % 6 == 0 ? '80' : '60' }} object-cover rounded-t-lg transform transition-all duration-300 hover:scale-105">
          <div class="p-6">
              <div class="flex items-center text-sm text-gray-500 mb-3">
                  <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <time datetime="{{ $article->created_at }}" class="text-indigo-600">{{ $article->created_at->format('d M Y') }}</time>
              </div>
                  <h2 class="text-2xl font-semibold text-gray-800 mb-3 hover:text-primary-600 transition-colors duration-300">
                  {{ $article->judul }}
                  </h2>
                  <p class="text-gray-600 line-clamp-3 mb-5">
                  {{ Str::limit(strip_tags($article->content), 120) }}
                 </p>
                  <a href="{{ route('user.article.show', $article->id) }}"
                  class="inline-block px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-primary-500 to-secondary-100 rounded-md hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-700 transition-colors">
                  Read More
                  </a>
          </div>
     </article>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10">
      {{ $articles->links('pagination::tailwind') }}
    </div>
  </div>
</x-layout-user>
