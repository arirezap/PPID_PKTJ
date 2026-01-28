<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex min-h-screen">
            <div class="w-64 bg-slate-900 text-white hidden md:block shadow-xl">
                <div class="p-6 text-xl font-bold border-b border-slate-800 text-blue-400">
                    PPID BACK OFFICE
                </div>
                <nav class="mt-6 px-4">
    <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-slate-800 mb-2 {{ request()->routeIs('dashboard') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
        <span class="ml-3 font-medium">Dashboard</span>
    </a>

    <a href="{{ route('admin.berita.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-slate-800 mb-2 {{ request()->routeIs('admin.berita.*') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
        <span class="ml-3 font-medium">Kelola Berita</span>
    </a>

    <a href="{{ route('admin.dokumen.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-slate-800 mb-2 {{ request()->routeIs('admin.dokumen.*') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
        <span class="ml-3 font-medium">Kelola Dokumen</span>
    </a>
</nav>
            </div>

            <div class="flex-1 flex flex-col">
                <header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700">Selamat Datang, {{ Auth::check() ? Auth::user()->name : 'Tamu' }}</h2>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                            Keluar (Logout)
                        </button>
                    </form>
                </header>

                <main class="p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>