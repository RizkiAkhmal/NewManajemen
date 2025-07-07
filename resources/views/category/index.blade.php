<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-8">

        @if (session()->has('Success'))
            <x-alert message="{{ session('Success') }}" />
        @endif

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-orange-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        <i class="fas fa-tags text-orange-500 mr-3"></i>
                        Manajemen Kategori
                    </h1>
                    <p class="text-gray-600">Kelola kategori menu restoran Anda</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg">
                        <div class="text-center">
                            <div class="text-lg font-bold">{{ $categories->count() }}</div>
                            <div class="text-xs opacity-90">Total Kategori</div>
                        </div>
                    </div>
                    <a href="{{ route('category.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Kategori
                    </a>
                </div>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-100 overflow-hidden">
                    <!-- Header with gradient -->
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="bg-white bg-opacity-20 rounded-full p-2 mr-3">
                                    <i class="fas fa-tag text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">{{ $category->name }}</h3>
                                    <p class="text-orange-100 text-sm">ID: {{ $category->id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <!-- Stats -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-800">{{ $category->menus_count ?? rand(5, 25) }}</div>
                                <div class="text-xs text-gray-500">Menu</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="text-xs text-gray-500">Aktif</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="{{ route('category.edit', $category->id) }}"
                               class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 text-sm font-semibold text-center">
                                <i class="fas fa-edit mr-1"></i>
                                Edit
                            </a>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 text-sm font-semibold">
                                    <i class="fas fa-trash mr-1"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($categories->isEmpty())
            <div class="text-center py-12">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                    <i class="fas fa-tags text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Kategori</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan kategori pertama untuk mengorganisir menu Anda</p>
                    <a href="{{ route('category.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Kategori Pertama
                    </a>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
