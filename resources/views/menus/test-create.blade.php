<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 px-4 py-8">

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-orange-100">
            <h1 class="text-3xl font-bold text-gray-800">Test Form - Tambah Menu</h1>
            <p class="text-gray-600">Form sederhana untuk test input</p>
        </div>

        <!-- Simple Form -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form enctype="multipart/form-data" method="POST" action="{{ route('menus.store') }}">
                    @csrf
                    
                    <!-- Foto Menu -->
                    <div class="mb-6">
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Menu
                        </label>
                        <input type="file" 
                               id="foto" 
                               name="foto" 
                               accept="image/*" 
                               required
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                    </div>

                    <!-- Nama Menu -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Menu
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                               placeholder="Masukkan nama menu">
                    </div>

                    <!-- Harga -->
                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Harga
                        </label>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               required
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                               placeholder="0">
                    </div>

                    <!-- Kategori -->
                    <div class="mb-6">
                        <label for="id_category" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>
                        <select name="id_category" 
                                id="id_category" 
                                required
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Menu
                        </label>
                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                  placeholder="Deskripsikan menu Anda..."></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <a href="{{ route('menus.index') }}" 
                           class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors text-center">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="flex-1 bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                            Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
