<nav x-data="{ open: false }" class="bg-white shadow-lg border-b border-orange-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                        <img src="{{ asset('assets/Toko.jpg') }}" alt="Restaurant Logo" class="h-10 w-10 rounded-full border-2 border-orange-300">
                        <span class="text-xl font-bold text-orange-600">RestoManager</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-all duration-200">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('menus.index')" :active="request()->routeIs('menus.index')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-all duration-200">
                        <i class="fas fa-utensils mr-2"></i>
                        {{ __('Menu') }}
                    </x-nav-link>

                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-all duration-200">
                        <i class="fas fa-tags mr-2"></i>
                        {{ __('Category') }}
                    </x-nav-link>
                </div>
            </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-orange-200 text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-orange-50 hover:text-orange-600 hover:border-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-200">
                            <i class="fas fa-user-circle mr-2 text-orange-500"></i>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <i class="fas fa-user-edit mr-2 text-gray-500"></i>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:text-orange-600 hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-orange-50 border-t border-orange-200">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center py-3 px-4 text-gray-700 hover:text-orange-600 hover:bg-orange-100 rounded-lg transition-all duration-200">
                <i class="fas fa-tachometer-alt mr-3 text-orange-500"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('menus.index')" :active="request()->routeIs('menus.index')" class="flex items-center py-3 px-4 text-gray-700 hover:text-orange-600 hover:bg-orange-100 rounded-lg transition-all duration-200">
                <i class="fas fa-utensils mr-3 text-orange-500"></i>
                {{ __('Menu') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')" class="flex items-center py-3 px-4 text-gray-700 hover:text-orange-600 hover:bg-orange-100 rounded-lg transition-all duration-200">
                <i class="fas fa-tags mr-3 text-orange-500"></i>
                {{ __('Category') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 border-t border-orange-200 px-4">
            <div class="flex items-center px-4 py-2 bg-white rounded-lg shadow-sm">
                <i class="fas fa-user-circle text-2xl text-orange-500 mr-3"></i>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center py-3 px-4 text-gray-700 hover:text-orange-600 hover:bg-orange-100 rounded-lg transition-all duration-200">
                    <i class="fas fa-user-edit mr-3 text-gray-500"></i>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center py-3 px-4 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all duration-200">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
