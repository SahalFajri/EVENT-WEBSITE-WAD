@props(['active' => false])
<a {{ $attributes }}
  class="{{ $active ? 'text-accent-500 font-bold' : 'text-gray-900 md:text-white hover:bg-accent-500 hover:text-white' }} block py-2 px-3 rounded"
  aria-current="{{ $active ? 'page' : false }}">
  {{ $slot }}
</a>
