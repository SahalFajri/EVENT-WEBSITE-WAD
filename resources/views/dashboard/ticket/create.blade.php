<x-layout-admin>
  <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Create a New Ticket</h1>

    <form action="{{ route('dashboard.ticket.store') }}" method="POST">
      @csrf

      {{-- Name --}}
      <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
          class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="Enter ticket name" required>
        @error('name')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      {{-- Stock --}}
      <div class="mb-5">
        <label for="stock" class="block mb-2 text-sm font-bold text-gray-700">Stock</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
          class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="Enter ticket stock" required>
        @error('stock')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      {{-- Price --}}
      <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-bold text-gray-700">Price</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}"
          class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="Enter ticket price" required>
        @error('price')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      {{-- Description --}}
      <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description</label>
        <textarea id="description" name="description" rows="4"
          class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="Enter ticket description" required>{{ old('description') }}</textarea>
        @error('description')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      {{-- Available --}}
      <div class="mb-5">
        <label for="is_available" class="block mb-2 text-sm font-bold text-gray-700">Available</label>
        <select name="is_available" id="is_available"
          class="w-full px-4 py-2 text-sm text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
          required>
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
        @error('is_available')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      {{-- Submit Button --}}
      <div class="flex justify-end">
        <button type="submit"
          class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
          Publish Ticket
        </button>
      </div>
    </form>
  </div>
</x-layout-admin>
