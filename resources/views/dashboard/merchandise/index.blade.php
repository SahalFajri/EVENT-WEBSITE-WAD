<x-layout-admin>

  <!-- Button to Open Modal -->
  <button id="openModalButton"
    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 
                hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 
                font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4">
    Add Merchandise
  </button>
  <label for="table-search" class="sr-only">Search</label>
  <div class="relative mt-1">
    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
      </svg>
    </div>
    <input type="text" id="table-search"
      class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      placeholder="Search for items">
  </div>
  </div>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-16 py-3">
          <span class="sr-only">Image</span>
        </th>
        <th scope="col" class="px-6 py-3">
          Product
        </th>
        <th scope="col" class="px-6 py-3">
          Qty
        </th>
        <th scope="col" class="px-6 py-3">
          Price
        </th>
        <th scope="col" class="px-6 py-3">
          Description
        </th>
        <th scope="col" class="px-6 py-3">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($merchandise as $item)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="w-20 h-20 object-cover">
          </td>
          <td class="px-6 py-4">{{ $item->name }}</td>
          <td class="px-6 py-4">{{ $item->stock }}</td>
          <td class="px-6 py-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
          <td class="px-6 py-4">{{ Str::limit($item->description, 50) }}</td>
          <td class="px-6 py-4">
            <!-- Action buttons -->
            <form action="{{ route('dashboard.merchandise.destroy', $item->id) }}" method="POST" class="inline"
            onsubmit="confirmDelete(event, this)">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>


  <!-- Modal -->
  <div id="modal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg w-1/3">
      <h2 class="text-2xl font-semibold mb-4">Add New Merchandise</h2>

      <!-- Form -->
      <form action="{{ route('dashboard.merchandise.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Merchandise Name -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="name" name="name"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 
                               rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            required>
        </div>

        <!-- Merchandise Stock -->
        <div class="mb-4">
          <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
          <input type="number" id="stock" name="stock"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 
                               rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            required>
        </div>

        <!-- Merchandise Price -->
        <div class="mb-4">
          <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
          <input type="number" id="price" name="price"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 
                               rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            required>
        </div>

        <!-- Merchandise Image -->
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
          <input type="file" id="image" name="image"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 
                               rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            required>
        </div>

        <!-- Merchandise Description -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea id="description" name="description" rows="4"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between">
          <button type="submit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl 
                                focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium 
                                rounded-lg text-sm px-5 py-2.5 text-center">
            Save Merchandise
          </button>
          <button type="button" id="closeModalButton"
            class="text-gray-700 bg-gray-200 hover:bg-gray-300 
                                focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm 
                                px-5 py-2.5 text-center">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <!-- Modal Scripts -->
  <script>
    // Get modal element
    const modal = document.getElementById("modal");
    const openModalButton = document.getElementById("openModalButton");
    const closeModalButton = document.getElementById("closeModalButton");

    // Open modal on button click
    openModalButton.addEventListener("click", () => {
      modal.classList.remove("hidden");
    });

    // Close modal on close button click
    closeModalButton.addEventListener("click", () => {
      modal.classList.add("hidden");
    });

    // Close modal when clicking outside the modal
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.add("hidden");
      }
    });
  </script>

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

    // Fungsi untuk menghapus data ketika tombol Yes, Delete ditekan   
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    deleteForm.submit();
    });

    // Fungsi untuk menutup modal tanpa menghapus
    document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
      document.getElementById('confirmModal').classList.add('hidden');
    });
  </script>

  <!-- search name -->
  <script>
    document.getElementById('table-search').addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const rows = document.querySelectorAll('table tbody tr'); // Select all rows in the table

      rows.forEach(function(row) {
        const productName = row.querySelector('td:nth-child(2)').textContent
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

  </body>

  </html>

</x-layout-admin>
