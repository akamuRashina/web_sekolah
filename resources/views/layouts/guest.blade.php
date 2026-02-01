<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CMS NESAS') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="antialiased h-full overflow-hidden">
        <div class="flex min-h-full">
            
            <div class="relative hidden w-0 flex-1 lg:block">
                <div class="absolute inset-0 h-full w-full bg-blue-700">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/90 to-indigo-900/90 z-10"></div>
                    <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1523050853063-bd8012fbb74a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="">
                    
                    <div class="relative z-20 flex flex-col justify-center h-full px-20 text-white">
                        <h1 class="text-5xl font-extrabold tracking-tight">CMS NESAS</h1>
                        <p class="mt-4 text-xl text-blue-100 italic">"The Center of Excellence. Mengelola data sekolah dengan lebih cerdas dan terintegrasi."</p>
                        <div class="mt-10 flex gap-4">
                            <div class="h-1 w-20 bg-blue-400 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:flex-none lg:px-20 xl:px-24 bg-white">
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        {{-- <div class="flex justify-center lg:justify-start">
                             <x-application-logo class="h-12 w-auto text-blue-600" />
                        </div> --}}
                        <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900">Selamat Datang</h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Silakan masuk ke akun administrator Anda.
                        </p>
                    </div>

                    <div class="mt-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>