<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-8">

        @if (session()->has('Success'))
            <x-alert message="{{ session('Success') }}" />
        @endif

        <!-- Welcome Section -->
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-orange-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">
                            <i class="fas fa-utensils text-orange-500 mr-3"></i>
                            Menu Restoran
                        </h1>
                        <p class="text-gray-600">Jelajahi koleksi menu lezat kami</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-3 rounded-lg">
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $Menus->count() }}</div>
                                <div class="text-sm opacity-90">Menu Tersedia</div>
                            </div>
                        </div>
                    </div>
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
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{ $menu->name }}</h3>

                        <div class="flex items-center justify-between mb-3">
                            <div class="text-2xl font-bold text-orange-600">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </div>
                            <div class="flex items-center text-yellow-500">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $menu->description }}</p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-gray-500 text-sm">
                                <i class="fas fa-clock mr-1"></i>
                                <span>15-20 min</span>
                            </div>
                            <button class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-red-600 transition-all duration-200 text-sm font-semibold">
                                <i class="fas fa-plus mr-1"></i>
                                Pesan
                            </button>
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
                    <p class="text-gray-500">Menu akan ditampilkan di sini setelah ditambahkan</p>
                </div>
            </div>
        @endif

        {{-- <!-- Pagination -->
        <div class="mt-8">
            {{$Menus->links()}}
        </div> --}}

    </div>
</x-app-layout>
