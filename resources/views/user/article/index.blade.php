<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Artikel -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Artikel & Berita Terbaru</h1>
      <p class="text-lg text-black">Temukan informasi terkini seputar event dan kegiatan kami</p>
    </div>


    <div id="default-carousel" class="relative w-full mb-8" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
          data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
          data-carousel-slide-to="4"></button>
      </div>
      <!-- Slider controls -->
      <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 1 1 5l4 4" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 9 4-4-4-4" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>


    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card Artikel -->
      {{-- @foreach ($artikels as $artikel)
        <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
            <img src="{{ $artikel->gambar }}" alt="{{ $artikel->judul }}" class="w-full h-48 object-cover">
            
            <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $artikel->created_at->format('d M Y') }}
                </div>

                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ $artikel->judul }}
                </h2>

                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ $artikel->excerpt }}
                </p>

                <div class="flex items-center justify-between">
                    <a href="{{ route('artikel.show', $artikel->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors duration-300">
                        Baca Selengkapnya
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ $artikel->views }} views
                    </div>
                </div>
            </div>
        </article>
        @endforeach  --}}

      {{-- home artikel --}}


      {{-- artikel pertama --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>


      {{-- artikel kedua --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>


      {{-- artikel ketiga --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>


      {{-- artikel keempat --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://i.pinimg.com/736x/52/b3/6f/52b36f810dd737b1e8c81edb152c14d4.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>


      {{-- artikel kelima --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>


      {{-- artikel keenam --}}
      <article
        class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
        <!-- Image -->
        <img src="https://eventnusantara.com/wp-content/uploads/2022/08/25-Djakarta-Festival-1.jpg" alt="Event Image"
          class="w-full h-60 object-cover">

        <!-- Content -->
        <div class="p-5">
          <!-- Date -->
          <div class="flex items-center text-sm text-gray-400 mb-2">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <time datetime="7777-05-08">8 May 7777</time>
          </div>

          <!-- Title -->
          <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-3">
            Lorem ipsum dolor sit amet
          </h2>

          <!-- Description -->
          <p class="text-gray-600 line-clamp-3 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, harum? Discover amazing experiences in
            this event and make unforgettable memories.
          </p>

          <!-- CTA -->
          <div class="flex justify-between items-center">
            <a href="/article/show"
              class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
              Read More
            </a>
            <div class="text-sm text-gray-400 flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              9 views
            </div>
          </div>
        </div>
      </article>
    </div>

    <!-- Pagination -->
    {{-- <div class="mt-12">
        {{ $artikels->links() }}
    </div> --}}
  </div>
</x-layout-user>
