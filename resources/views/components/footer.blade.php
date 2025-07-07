
<footer class="mt-20 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white">
    <div class="mx-auto w-full max-w-screen-xl">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 gap-8 px-6 py-12 lg:py-16 md:grid-cols-4">
            <!-- Restaurant Info -->
            <div class="md:col-span-2">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('assets/Toko.jpg') }}" alt="Restaurant Logo" class="h-12 w-12 rounded-full border-2 border-orange-400 mr-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gradient-restaurant">Manajemen Restoran</h2>
                        <p class="text-gray-300 text-sm">Sistem Pengelolaan Menu Terpadu</p>
                    </div>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Platform manajemen restoran yang memudahkan Anda dalam mengelola menu, kategori, dan operasional restoran dengan interface yang modern dan user-friendly.
                </p>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-orange-400">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="text-sm text-gray-300">Jakarta, Indonesia</span>
                    </div>
                    <div class="flex items-center text-orange-400">
                        <i class="fas fa-phone mr-2"></i>
                        <span class="text-sm text-gray-300">+62 123 456 789</span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="mb-6 text-lg font-semibold text-white">Menu Cepat</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-tachometer-alt mr-2 text-orange-500"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-utensils mr-2 text-orange-500"></i>
                            Kelola Menu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-tags mr-2 text-orange-500"></i>
                            Kelola Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-user-cog mr-2 text-orange-500"></i>
                            Pengaturan Profil
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="mb-6 text-lg font-semibold text-white">Dukungan</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-question-circle mr-2 text-orange-500"></i>
                            Bantuan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-book mr-2 text-orange-500"></i>
                            Dokumentasi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-envelope mr-2 text-orange-500"></i>
                            Kontak Support
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors duration-200 flex items-center">
                            <i class="fas fa-shield-alt mr-2 text-orange-500"></i>
                            Kebijakan Privasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="px-6 py-6 bg-gray-900 border-t border-gray-700">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center">
                    <span class="text-sm text-gray-400">
                        © {{ date('Y') }}
                        <span class="text-orange-400 font-semibold">Manajemen Restoran</span>.
                        Semua hak dilindungi.
                    </span>
                </div>

                <!-- Social Media Links -->
                <div class="flex mt-4 md:mt-0 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-200 transform hover:scale-110">
                        <i class="fab fa-facebook-f text-lg"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-200 transform hover:scale-110">
                        <i class="fab fa-twitter text-lg"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-200 transform hover:scale-110">
                        <i class="fab fa-instagram text-lg"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors duration-200 transform hover:scale-110">
                        <i class="fab fa-whatsapp text-lg"></i>
                        <span class="sr-only">WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-4 pt-4 border-t border-gray-800">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between text-xs text-gray-500">
                    <div class="flex items-center space-x-4">
                        <span>Dibuat dengan ❤️ untuk kemudahan pengelolaan restoran</span>
                    </div>
                    <div class="flex items-center space-x-4 mt-2 md:mt-0">
                        <span>Version 1.0.0</span>
                        <span>•</span>
                        <span>Laravel {{ app()->version() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
