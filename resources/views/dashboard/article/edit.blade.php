<x-layout-admin>
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Article</h1>
        
        <form action="{{ route('dashboard.article.update', $article->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Article Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required autofocus                    
                    class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter article title" required>
                @error('title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-bold text-gray-700">Upload Image</label>
                <input type="file" id="image" name="image"
                    class="w-full px-4 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer focus:ring-blue-500 focus:border-blue-500"
                    accept="image/*">
                @error('image')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="mt-3">
                    <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="w-[250px]">
                </div>
            </div>



            {{-- Content --}}
            <div class="mb-5">
                <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Content</label>
                <div class="w-full p-4 bg-gray-50 border border-gray-300 rounded-lg">
                    <textarea id="editor" name="content" rows="8"
                        class="w-full px-2 py-2 text-sm text-gray-800 bg-transparent border-0 focus:ring-0 focus:outline-none"
                        placeholder="Write an article..." required>{{ old('content', $article->content) }}</textarea>
                </div>
                @error('content')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Publish Article
                </button>
            </div>
        </form>
    </div>
</x-layout-admin>
