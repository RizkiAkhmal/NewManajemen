<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 px-4 py-8">

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-orange-100">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-3 rounded-lg mr-4">
                    <i class="fas fa-plus text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Tambah Menu Baru</h1>
                    <p class="text-gray-600">Lengkapi informasi menu yang akan ditambahkan</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4">
                <h2 class="text-xl font-semibold text-white">
                    <i class="fas fa-utensils mr-2"></i>
                    Informasi Menu
                </h2>
            </div>

            <div class="p-8">
                <form enctype="multipart/form-data" method="POST" action="{{ route('menus.store') }}" class="space-y-6">
                    @csrf

                    <!-- Form Fields -->
                    <div class="space-y-6">
                        <!-- Image Upload -->
                        <div>
                            <label for="foto" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-camera mr-2 text-orange-500"></i>
                                Foto Menu
                            </label>
                            <input type="file"
                                   id="foto"
                                   name="foto"
                                   accept="image/*"
                                   required
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 border border-gray-300 rounded-lg p-2">
                            <p class="mt-1 text-sm text-gray-500">Upload foto menu (PNG, JPG, maksimal 2MB)</p>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-signature mr-2 text-orange-500"></i>
                                Nama Menu
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                   placeholder="Masukkan nama menu">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-money-bill-wave mr-2 text-orange-500"></i>
                                Harga
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500 pointer-events-none">Rp</span>
                                <input type="number"
                                       id="price"
                                       name="price"
                                       value="{{ old('price') }}"
                                       required
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                       placeholder="0">
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="id_category" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tags mr-2 text-orange-500"></i>
                                Kategori
                            </label>
                            <select name="id_category"
                                    id="id_category"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_category')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-2 text-orange-500"></i>
                                Deskripsi Menu
                            </label>
                            <textarea id="description"
                                      name="description"
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                      placeholder="Deskripsikan menu Anda...">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('menus.index') }}"
                           class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors text-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>

