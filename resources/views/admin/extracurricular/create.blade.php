<div class="max-w-2xl mx-auto p-6 bg-white shadow-xl rounded-2xl mt-10 border border-gray-100">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Tambah Ekstrakurikuler</h1>

    <form action="{{ route('extracurricular.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Ekstrakurikuler</label>
            <input type="text" name="extracurricular_name" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Pembimbing</label>
            <input type="text" name="instructor" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border"></textarea>
        </div>

        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded-lg hover:bg-indigo-700 transition font-bold shadow-lg">Simpan</button>
            <a href="{{ route('extracurricular.index') }}" class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>