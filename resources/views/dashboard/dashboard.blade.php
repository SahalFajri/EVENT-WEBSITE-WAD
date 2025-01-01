<x-layout-admin>
  <h1 class="text-2xl font-bold text-gray-800 mb-6">Welcome {{ auth()->user()->name }} to Dashboard</h1>

  <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
    <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Statistics</h2>
      <p class="text-gray-600 dark:text-gray-400">Here you can find some statistics about the website.</p>
      <ul class="mt-4 space-y-2">
        <li class="flex items-center">
          <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users:</span>
          <span class="ml-auto text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $total_user }}</span>
        </li>
        <li class="flex items-center">
          <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Articles:</span>
          <span class="ml-auto text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $total_article }}</span>
        </li>
        <li class="flex items-center">
          <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Sales:</span>
          <span class="ml-auto text-sm font-semibold text-gray-700 dark:text-gray-200">$12,345</span>
        </li>
      </ul>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Recent Articles</h2>
      <p class="text-gray-600 dark:text-gray-400">Here you can find the most recent articles.</p>
      <ul class="mt-4 space-y-2">
        @foreach ($articles as $article)
          <li class="flex items-center">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Article {{ $article->id }}:</span>
            <span class="ml-auto text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $article->title }}</span>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Recent Users</h2>
      <p class="text-gray-600 dark:text-gray-400">Here you can find the most recent users.</p>
      <ul class="mt-4 space-y-2">
        @foreach ($users as $user)
          <li class="flex items-center">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">User {{ $user->id }}:</span>
            <span class="ml-auto text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $user->email }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</x-layout-admin>
