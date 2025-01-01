<nav class="bg-main border-gray-200 fixed w-full z-50 top-0 start-0 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-6">
    <a href="{{ route('home') }}" class="flex items-center space-x-3">
      {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> --}}
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">MelodyMania</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-3">
      @auth
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
          id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full"
            src="{{ auth()->user()->profile_photo_url ?? asset('photo-profile/default.png') }}" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
          id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
            <span class="block text-sm  text-gray-500 truncate">{{ auth()->user()->email }}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{ route('dashboard.index') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            </li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-red-700 hover:bg-red-100">Sign
                  out</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <a href="{{ route('login') }}"
          class="text-sm text-white bg-primary-800 border-2 border-primary-800 rounded px-4 py-2 focus:ring-4 focus:ring-primary-300 hover:bg-accent-400 hover:border-accent-400">Login</a>
        <a href="{{ route('sign-up') }}"
          class="text-sm text-primary-800 bg-transparent border-2 border-primary-800 rounded px-4 py-2 focus:ring-4 focus:ring-primary-300 hover:bg-primary-800 hover:text-white">Sign
          up</a>
      @endauth
      <button data-collapse-toggle="navbar-user" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:text-accent-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul
        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-4 md:flex-row md:mt-0 md:border-0 md:bg-transparent">
        <li>
          <x-navigation-user href="{{ route('home') }}" :active="Request::is('home')">Home</x-navigation-user>
        </li>
        <li>
          <x-navigation-user href="{{ route('user.ticket.index') }}" :active="Request::is('ticket*')">Ticket</x-navigation-user>
        </li>
        <li>
          <x-navigation-user href="{{ route('user.merchandise.index') }}" :active="Request::is('merchandise')">Merchandise</x-navigation-user>
        </li>
        <li>
          <x-navigation-user href="{{ route('user.article.index') }}" :active="Request::is('article')">Article</x-navigation-user>
        </li>
        <li>
          <x-navigation-user href="{{ route('user.gallery.index') }}" :active="Request::is('gallery')">Gallery</x-navigation-user>
        </li>
      </ul>
    </div>
  </div>
</nav>
