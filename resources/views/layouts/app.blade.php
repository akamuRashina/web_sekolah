<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: localStorage.getItem('dark') === 'true', sidebarOpen: false }" 
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" 
      :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CMS NESAS') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            [x-cloak] { display: none !important; }
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 transition-colors duration-300">
        
        <div class="flex h-screen overflow-hidden">
            
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition-opacity ease-linear duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition-opacity ease-linear duration-300" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 z-40 lg:hidden bg-slate-900/50 backdrop-blur-sm" 
                 @click="sidebarOpen = false"></div>

            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
                   class="fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
                
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between px-6 py-8">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-600 rounded-lg shadow-lg shadow-blue-500/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="text-xl font-bold tracking-tight dark:text-white">NESAS <span class="text-blue-600 text-xs block -mt-1 uppercase tracking-widest font-extrabold">Control Panel</span></span>
                        </div>
                        <button @click="sidebarOpen = false" class="lg:hidden p-2 text-slate-500 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
                        @include('layouts.navigation') </nav>

                    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                        <button @click="darkMode = !darkMode" 
                                class="flex items-center justify-between w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-800 transition hover:bg-slate-200 dark:hover:bg-slate-700">
                            <span class="text-sm font-medium" x-text="darkMode ? 'Dark Mode' : 'Light Mode'"></span>
                            <div class="relative w-10 h-6 rounded-full bg-slate-300 dark:bg-blue-600 transition-colors">
                                <div :class="darkMode ? 'translate-x-5' : 'translate-x-1'" class="absolute top-1 left-0 w-4 h-4 bg-white rounded-full transition-transform duration-200"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden">
                
                <header class="flex items-center justify-between px-6 py-4 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="p-2 mr-4 text-slate-600 dark:text-slate-400 lg:hidden focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        
                        @isset($header)
                            <div class="text-xl font-bold text-slate-800 dark:text-white">
                                {{ $header }}
                            </div>
                        @endisset
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex flex-col items-end leading-tight mr-2">
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-300">{{ Auth::user()->name }}</span>
                            <span class="text-[10px] text-blue-600 font-bold uppercase tracking-widest">Admin</span>
                        </div>
                        <div class="h-10 w-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold shadow-md">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 dark:bg-slate-950 px-6 py-8">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>

            </div>
        </div>
    </body>
</html>