<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
      <span href="#" class="flex items-center mb-6 text-2xl font-semibold bg-clip-text bg-main text-transparent">
        {{-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo"> --}}
        MelodyMania
      </span>

      @if (session()->has('success'))
        <div id="alert"
          class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
          role="alert">
          <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div class="ms-3 text-sm font-medium">
            <span class="font-semibold">Success</span> {{ session('success') }}
          </div>
          <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
          </button>
        </div>
      @endif


      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Sign in to your account
          </h1>
          <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                email</label>
              <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="name@company.com" required="">
              @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
              <input type="password" name="password" id="password" placeholder="Your password"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                required="">
              @error('password')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" aria-describedby="remember" type="checkbox"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500">Remember me</label>
                </div>
              </div>
              <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
            </div>
            <button type="submit"
              class="w-full text-white bg-alt focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
              in</button>
            <p class="text-sm font-light text-gray-500">
              Don’t have an account yet? <a href="{{ route('sign-up') }}"
                class="font-medium text-primary-600 hover:underline">Sign
                up</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-layout-user>
