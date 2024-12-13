<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 ">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">

            <!-- Logo Section -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/Toko.jpg') }}" alt="Deskripsi Gambar" class="h-32 rounded-lg shadow-lg border-4 border-white">
            </div>

            <!-- Card Section -->
            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white dark:bg-gray-800 shadow-2xl rounded-xl border-2 border-gray-200">
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Selamat Datang!</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Ayo mulai perjalanan belanja Anda di toko kami.</p>
                </div>

                <!-- Main Content -->
                <div>
                    {{ $slot }}
                </div>

            </div>
        </div>
    </body>
</html>
