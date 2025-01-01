<x-layout-admin>

  <form class="max-w-sm mx-auto" action="{{ route('dashboard.admin.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- name --}}
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
      <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="your name" required />
      @error('name')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- /name --}}

    {{-- email --}}
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="name@flowbite.com" required />
      @error('email')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- /email --}}

    {{-- password --}}
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input type="password" id="password" name="password" placeholder="keep it blank if you don't want to change"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
      @error('password')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- /password --}}

    {{-- repeat-password --}}
    <div class="mb-5">
      <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat
        password</label>
      <input type="password" id="password_confirmation" name="password_confirmation"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
      @error('password_confirmation')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- repeat-password --}}

    {{-- phone --}}
    <div class="mb-5">
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your phone</label>
      <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="+62xxxxxxxxxx" required />
      @error('phone')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- /phone --}}

    {{-- file upload --}}
    <div class="mb-5">
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_picture">Upload Profile
        Picture</label>
      <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        name="profile_picture" aria-describedby="profile_picture_help" id="profile_picture" type="file">
      <span class="text-gray-500 text-sm">keep it blank if you don't want to change</span>
      <div class="mt-3">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="w-[250px]">
      </div>
      @error('profile_picture')
        <span class="text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>
    {{-- /file upload --}}

    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
  </form>

</x-layout-admin>
