<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required 
                    class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    value="{{ old('email') }}" placeholder="admin@nesas.sch.id">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-500">Lupa password?</a>
                @endif
            </div>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required 
                    class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" 
                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600 cursor-pointer">
            <label for="remember_me" class="ml-3 block text-sm leading-6 text-gray-600 cursor-pointer">Ingat saya di perangkat ini</label>
        </div>

        <div>
            <button type="submit" 
                class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-3 text-sm font-bold leading-6 text-white shadow-lg hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all duration-200 active:scale-[0.98]">
                Masuk Sekarang
            </button>
        </div>
    </form>

    <p class="mt-10 text-center text-xs text-gray-400 lg:text-left">
        &copy; 2026 CMS NESAS - SMK Negeri 1 Sumedang. <br>
        Sistem ini diproteksi untuk keamanan data sekolah.
    </p>
</x-guest-layout>