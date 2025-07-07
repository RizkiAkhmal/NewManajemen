<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Manajemen Restoran') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Font Awesome for Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-inter antialiased">
        <div class="min-h-screen bg-gradient-to-br from-orange-50 via-red-50 to-yellow-50">
            @include('layouts.navigation')

            <!-- Hero Section with Logo -->
            <div class="relative bg-gradient-to-r from-orange-600 to-red-600 py-8 shadow-lg">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="relative flex justify-center items-center">
                    <div class="text-center">
                        <img src="{{ asset('assets/Toko.jpg') }}" alt="Restaurant Logo" class="h-16 w-16 mx-auto rounded-full shadow-lg border-4 border-white mb-2">
                        <h1 class="text-2xl font-bold text-white">Manajemen Restoran</h1>
                        <p class="text-orange-100 text-sm">Sistem Pengelolaan Menu & Kategori</p>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}

                <x-footer/>
            </main>
        </div>
    </body>
</html>
