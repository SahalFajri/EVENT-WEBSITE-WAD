<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
      <span href="#" class="flex items-center mb-6 text-2xl font-semibold bg-clip-text bg-main text-transparent">
        {{-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo"> --}}
        MelodyMania
      </span>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Create an account
          </h1>
          <form class="space-y-4 md:space-y-6" action="{{ route('sign-up') }}" method="POST">
            @csrf
            {{-- Name --}}
            <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your
                name</label>
              <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('name') border-red-500 bg-red-50 focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5"
                placeholder="John Doe" required="">
              @error('name')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            {{-- /Name --}}

            {{-- Email --}}
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                email</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('email') border-red-500 bg-red-50 focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5"
                placeholder="john@gmail.com" required="">
              @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            {{-- /Email --}}

            {{-- Phone --}}
            <div>
              <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Your
                phone</label>
              <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('phone') border-red-500 bg-red-50 focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5"
                placeholder="+62xxxxxxxxxx" required="">
              @error('phone')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            {{-- /Phone --}}

            {{-- Password --}}
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
              <input type="password" name="password" id="password" placeholder="Your password"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('password') border-red-500 bg-red-50 focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5"
                required="">
              @error('password')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            {{-- /Password --}}

            {{-- Repeat Password --}}
            <div>
              <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Repeat
                password</label>
              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Your password"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('password_confirmation') border-red-500 bg-red-50 focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5"
                required="">
              @error('password_confirmation')
                <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
            </div>
            {{-- /Repeat Password --}}

            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="terms" aria-describedby="terms" type="checkbox"
                  class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                  required="">
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and
                    Conditions</a></label>
              </div>
            </div>
            <button type="submit"
              class="w-full text-white bg-alt focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
              an account</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Already have an account? <a href="{{ route('login') }}"
                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

</x-layout-user>
