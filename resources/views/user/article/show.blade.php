<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="container mx-auto p-6">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
      <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
        class="w-full h-64 object-cover">

      <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title}}</h1>
        <div class="text-sm text-gray-500 mb-4">Created By: {{ $article->user->name }}</div>
        <div class="flex items-center text-sm text-gray-500 mb-4">
          <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <time datetime="7777-05-08">{{ $article->created_at->format('d M Y') }}</time>
        </div>

        <p class="text-gray-600 mb-4">{{$article->content}}</p>

        <a href="/article"
          class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-primary-600 to-secondary-100 text-white text-sm font-medium rounded-md hover:bg-gradient-to-r hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
          Back
        </a>
      </div>
    </article>
  </div>
</x-layout-user>
