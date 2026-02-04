<div class="max-w-2xl mx-auto mt-10 p-6">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border">
        <div class="bg-indigo-600 p-8 text-white text-center">
            <h1 class="text-3xl font-extrabold uppercase">{{ $extracurricular->extracurricular_name }}</h1>
        </div>
        
        <div class="p-8 space-y-6">
            <div>
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pembimbing</h4>
                <p class="text-xl text-gray-800 font-semibold">{{ $extracurricular->instructor }}</p>
            </div>

            <div>
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Deskripsi Kegiatan</h4>
                <div class="text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-xl">
                    {{ $extracurricular->description ?? 'Tidak ada deskripsi.' }}
                </div>
            </div>

            <div class="pt-6 border-t flex justify-between">
                <a href="{{ route('extracurricular.index') }}" class="text-indigo-600 font-bold">← Kembali</a>
                <a href="{{ route('extracurricular.edit', $extracurricular->id) }}" class="bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 font-semibold text-gray-700">Edit Data</a>
            </div>
        </div>
    </div>
</div>