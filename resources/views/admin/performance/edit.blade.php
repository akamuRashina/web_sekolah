<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-xl mt-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Edit Prestasi</h1>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-6 text-sm">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('performance.update', $performance->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="title" value="{{ $performance->title }}" required class="w-full border-gray-300 rounded-md p-2 border focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category" class="w-full border-gray-300 rounded-md p-2 border">
                    <option value="academic" {{ $performance->category == 'academic' ? 'selected' : '' }}>Academic</option>
                    <option value="non academic" {{ $performance->category == 'non academic' ? 'selected' : '' }}>Non Academic</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="number" name="year" value="{{ $performance->year }}" class="w-full border-gray-300 rounded-md p-2 border">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md p-2 border">{{ $performance->description }}</textarea>
        </div>

        <div class="p-4 bg-gray-50 rounded-lg border">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini:</label>
            @if($performance->image)
                <img src="{{ asset('storage/' . $performance->image) }}" class="w-32 h-24 object-cover rounded-lg mb-3 shadow">
            @endif
            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:bg-blue-50 file:text-blue-700">
            <p class="text-xs text-gray-400 mt-2 italic">*Kosongkan jika tidak ingin ganti gambar.</p>
        </div>

        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition font-semibold">Update Data</button>
            <a href="{{ route('performance.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>