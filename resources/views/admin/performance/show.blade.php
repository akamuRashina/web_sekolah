<div class="max-w-xl mx-auto p-6 mt-10 bg-white shadow-xl rounded-2xl overflow-hidden">
    @if($performance->image)
        <img src="{{ asset('storage/' . $performance->image) }}" class="w-full h-64 object-cover border-b">
    @endif

    <div class="p-6">
        <div class="flex justify-between items-start">
            <h3 class="text-2xl font-bold text-gray-800">{{ $performance->title }}</h3>
            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full uppercase">
                {{ $performance->category }}
            </span>
        </div>
        
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span class="font-semibold text-gray-700 mr-2">📅 Tahun:</span> {{ $performance->year }}
        </div>

        <div class="mt-6">
            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">Deskripsi</h4>
            <p class="text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-lg italic">
                {{ $performance->description ?? 'Tidak ada deskripsi tersedia.' }}
            </p>
        </div>

        <div class="mt-8 pt-6 border-t flex justify-between">
            <a href="{{ route('performance.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                ← Kembali ke Daftar
            </a>
            <a href="{{ route('performance.edit', $performance->id) }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-black transition">
                Edit Data
            </a>
        </div>
    </div>
</div>