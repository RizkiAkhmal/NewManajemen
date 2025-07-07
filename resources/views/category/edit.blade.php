<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 px-4 py-8">

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-orange-100">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-3 rounded-lg mr-4">
                    <i class="fas fa-edit text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Edit Kategori</h1>
                    <p class="text-gray-600">Perbarui informasi kategori</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4">
                <h2 class="text-xl font-semibold text-white">
                    <i class="fas fa-tags mr-2"></i>
                    Informasi Kategori
                </h2>
            </div>

            <div class="p-8">
                <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Category Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-tag mr-2 text-orange-500"></i>
                            Nama Kategori
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $category->name) }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                               placeholder="Contoh: Makanan Utama, Minuman, Dessert">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Preview -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-eye mr-2 text-orange-500"></i>
                            Preview Kategori
                        </h3>
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold inline-block">
                            <span x-data="{ name: '{{ $category->name }}' }" x-text="name" @input.debounce="name = $event.target.value" @keyup.window="if($event.target.id === 'name') name = $event.target.value"></span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('category.index') }}"
                           class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors text-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-600 hover:to-blue-700 transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Perbarui Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
