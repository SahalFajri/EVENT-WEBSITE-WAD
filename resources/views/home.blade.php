<x-layout-user>
  <x-slot:title>{{ $title }}</x-slot:title>

  <section
    class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply h-screen flex items-center justify-center">
    <div class="px-4 mx-auto max-w-screen-xl text-center animate-slide-up">
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Welcome to
        <span class="bg-clip-text bg-main text-transparent">MelodyMania</span>
      </h1>
      <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Experience the ultimate musical
        journey with live performances, exclusive merch, and unforgettable moments.</p>
      <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
        <a href="{{ route('user.ticket.index') }}"
          class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-alt focus:ring-4 focus:ring-secondary-300">
          Check tickets
          <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
        {{-- <a href="#"
          class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
          Learn more
        </a> --}}
      </div>
    </div>
  </section>

</x-layout-user>
