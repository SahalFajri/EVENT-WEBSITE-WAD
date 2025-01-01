<x-layout-admin>

  <h1 class="text-2xl font-bold text-gray-800 mb-6">Data Admin</h1>

  <div class="flex justify-start gap-2 items-center">
    <a href="{{ route('dashboard.admin.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
      Admin</a>
    </a>
    <a href="{{ route('dashboard.admin.download_pdf') }}" target="_blank"
      class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Download
      PDF
    </a>
  </div>

  <div class="pb-4 mt-4 bg-white">
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative mt-1">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <input type="text" id="table-search"
        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Search for items">
    </div>
  </div>

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
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  @endif
  <!-- table -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <table class="w-full text-sm text-left text-gray-500 mt-4">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">
            name
          </th>
          <th scope="col" class="px-6 py-3">
            email
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
          <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-6 py-4 font-semibold text-gray-900">
              {{ $user->name }}
            </td>
            <td class="px-6 py-4">
              {{ $user->email }}
            </td>
            <td class="flex items-center px-6 py-4">
              <a href="{{ route('dashboard.admin.edit', $user->id) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

              <form action="{{ route('dashboard.admin.destroy', $user->id) }}" method="post"
                onsubmit="confirmDelete(event, this)">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4">Delete</button>

              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center py-4">No admin available</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Modal Konfirmasi Delete -->
  <div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 hidden">
    <div class="flex justify-center items-center h-screen">
      <div class="bg-white p-5 rounded-lg w-96">
        <div class="flex justify-center">
          <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
          <dotlottie-player src="https://lottie.host/5c080ae8-db1f-420c-9c25-bb35aa30831d/7IU7yXMdIs.lottie"
            background="transparent" speed="1" style="width: 175px; height: 175px" loop
            autoplay></dotlottie-player>
        </div>
        <h3 class="text-lg font-semibold mb-4 text-center">Are you sure you want to delete this item?</h3>
        <div class="flex justify-center space-x-4">
          <button id="confirmDeleteBtn"
            class="text-white bg-green-500 hover:bg-green-600 font-semibold rounded-lg px-4 py-2 mr-2">Yes,
            Delete</button>
          <button id="cancelDeleteBtn"
            class="text-gray-500 bg-gray-300 hover:bg-gray-400 font-semibold rounded-lg px-4 py-2">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let deleteForm;

    // Fungsi untuk menampilkan modal konfirmasi
    function confirmDelete(event, form) {
      event.preventDefault();
      deleteForm = form;
      document.getElementById('confirmModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal konfirmasi
    document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
      document.getElementById('confirmModal').classList.add('hidden');
    });

    // Fungsi untuk menghapus data ketika tombol Yes, Delete ditekan
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
      deleteForm.submit();
    });
  </script>

  <script>
    document.getElementById('table-search').addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const rows = document.querySelectorAll('table tbody tr'); // Select all rows in the table

      rows.forEach(function(row) {
        const productName = row.querySelector('td:nth-child(1)').textContent
          .toLowerCase(); // Assuming name is in the first column

        // Show or hide rows based on the search term
        if (productName.includes(searchTerm)) {
          row.style.display = ''; // Show row
        } else {
          row.style.display = 'none'; // Hide row
        }
      });
    });
  </script>
</x-layout-admin>
