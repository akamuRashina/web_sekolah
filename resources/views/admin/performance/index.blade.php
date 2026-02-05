<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Prestasi</h1>
        <a href="{{ route('performance.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            + Tambah Data
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">No</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Judul</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Kategori</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Tahun</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Deskripsi</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Gambar</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($performance as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item->title }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $item->category == 'academic' ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700' }}">
                            {{ ucwords($item->category) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">{{ $item->year }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ Str::limit($item->description, 50) }}
                    </td>
                    <td class="px-6 py-4">
                        @if($item->image && !str_contains($item->image, 'tmp'))
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-12 object-cover rounded shadow-sm">
                        @else
                            <span class="text-red-500 text-xs italic">Gagal Upload</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                        <a href="{{ route('performance.show', $item->id) }}" class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('performance.edit', $item->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('performance.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-gray-500 italic">Data masih kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $performance->links() }}
    </div>
</div>