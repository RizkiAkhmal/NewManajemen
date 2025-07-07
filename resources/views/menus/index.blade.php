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
                        <i class="fas fa-cogs text-orange-500 mr-3"></i>
                        Manajemen Menu
                    </h1>
                    <p class="text-gray-600">Kelola menu restoran Anda dengan mudah</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg">
                        <div class="text-center">
                            <div class="text-lg font-bold">{{ $Menus->total() }}</div>
                            <div class="text-xs opacity-90">Total Menu</div>
                        </div>
                    </div>
                    <a href="{{route('menus.create')}}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Menu
                    </a>
                </div>
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($Menus as $menu)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="{{ url('storage/' . $menu->foto) }}"
                             alt="{{ $menu->name }}"
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 right-3">
                            <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $menu->category->name }}
                            </span>
                        </div>
                        <div class="absolute top-3 left-3">
                            <span class="bg-white bg-opacity-90 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">
                                ID: {{ $menu->id }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{ $menu->name }}</h3>

                        <div class="flex items-center justify-between mb-3">
                            <div class="text-2xl font-bold text-orange-600">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </div>
                            <div class="flex items-center text-gray-500 text-sm">
                                <i class="fas fa-eye mr-1"></i>
                                <span>{{ rand(50, 200) }}</span>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $menu->description }}</p>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}"
                               class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 text-sm font-semibold text-center">
                                <i class="fas fa-edit mr-1"></i>
                                Edit
                            </a>
                            <form action="{{ route('menus.delete', $menu->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
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

        @if($Menus->isEmpty())
            <div class="text-center py-12">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                    <i class="fas fa-utensils text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Menu</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan menu pertama Anda</p>
                    <a href="{{route('menus.create')}}" class="inline-flex items-center bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Menu Pertama
                    </a>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        @if($Menus->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-lg shadow-lg p-4 border border-gray-100">
                    {{ $Menus->links() }}
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
