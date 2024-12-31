<x-layout-admin>
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Gallery</h1>
        
        <form action="{{ route('dashboard.gallery.update', $gallery->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
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
                    <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="w-[250px]">
                </div>
            </div>

            {{-- Image Alt --}}
            <div class="mb-5">
                <label for="image_alt" class="block mb-2 text-sm font-bold text-gray-700">Image Alt</label>
                <input type="text" id="image_alt" name="image_alt" value="{{ old('image_alt', $gallery->image_alt) }}" required autofocus                    
                    class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter image alt" required>
                @error('image_alt')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            
            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Edit Gallery
                </button>
            </div>
        </form>
    </div>
</x-layout-admin>
