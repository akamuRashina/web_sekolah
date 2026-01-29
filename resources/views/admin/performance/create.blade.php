<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Form Tambah Data Performance</h1>
  @if(session('success')) <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-300 rounded-md"> {{ session('success') }} </div> @endif <!-- Pesan Error --> @if($errors->any()) <div class="mb-4 p-4 text-red-700 bg-red-100 border border-red-300 rounded-md"> <ul class="list-disc list-inside"> @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div> @endif

  <form action="{{route ('performance.store')}}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
    @csrf

    <!-- Judul -->
    <div>
      <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
      <input type="text" id="judul" name="judul" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Kategori -->
    <div>
      <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
      <select id="kategori" name="kategori" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <option value="akademik">Akademik</option>
        <option value="nonakademik">Nonakademik</option>
      </select>
    </div>

    <!-- Deskripsi -->
    <div>
      <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
      <textarea id="deskripsi" name="deskripsi" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <!-- Tahun -->
    <div>
      <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
      <input type="number" id="tahun" name="tahun" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Gambar -->
    <div>
      <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
      <input type="file" id="gambar" name="gambar" accept="image/*"
             class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    </div>

    <!-- Tombol Submit -->
    <div>
      <button type="submit" 
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">
        Simpan Data
      </button>
    </div>
  </form>
</div>
