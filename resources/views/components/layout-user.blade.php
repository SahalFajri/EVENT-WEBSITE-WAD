<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} | Event</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

  <x-navbar-user />

  @if (Request::is('home'))
    <main>
      <div>
        {{ $slot }}
      </div>
    </main>
  @else
    <main class="pt-20">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  @endif

</body>

</html>