<div :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="bg-white border-r border-gray-200 transition-all duration-300 flex flex-col fixed h-full z-30">
    <!-- Logo -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200">
        <h1 x-show="sidebarOpen" class="text-xl font-bold text-gray-800">POS Admin</h1>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
            <svg x-show="sidebarOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <svg x-show="!sidebarOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Menu Items -->
    <nav class="flex-1 py-4 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Dashboard</span>
        </a>

        <!-- Products -->
        <a href="{{ route('products.index') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('products.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Products</span>
        </a>

        <!-- Sales -->
        <a href="{{ route('sales.index') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('sales.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Sales</span>
        </a>

        <!-- Customers -->
        <a href="{{ route('customers.index') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('customers.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Customers</span>
        </a>

        <!-- Analytics -->
        <a href="{{ route('analytics.index') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('analytics.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Analytics</span>
        </a>

        <!-- Settings -->
        <a href="{{ route('settings.index') }}"
            class="w-full flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('settings.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span x-show="sidebarOpen" class="font-medium whitespace-nowrap">Settings</span>
        </a>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t border-gray-200">
        <div x-data="{ showMenu: false }" class="relative">
            <!-- Profile Button -->
            <button @click="showMenu = !showMenu"
                class="w-full flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-white font-semibold flex-shrink-0">
                    {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                </div>
                <div x-show="sidebarOpen" class="flex-1 text-left overflow-hidden">
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email ?? 'email@example.com' }}</p>
                </div>
                <svg x-show="sidebarOpen" :class="showMenu ? 'rotate-180' : ''"
                    class="w-4 h-4 text-gray-400 transition-transform duration-200 flex-shrink-0" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="showMenu && sidebarOpen" @click.away="showMenu = false" x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute bottom-full left-0 right-0 mb-2 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden min-w-[12rem]">

                <!-- Profile Option -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-sm text-gray-700">My Profile</span>
                </a>

                <div class="border-t border-gray-100"></div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 hover:bg-red-50 transition-colors group">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span class="text-sm text-red-600 font-medium">Logout</span>
                    </button>
                </form>
            </div>

            <!-- Compact Logout Button (when sidebar collapsed) -->
            <div x-show="!sidebarOpen" x-data="{ showTooltip: false }" class="mt-2" x-cloak>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                        class="relative w-full p-2 rounded-lg hover:bg-red-50 transition-colors group">
                        <svg class="w-5 h-5 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>

                        <!-- Tooltip -->
                        <div x-show="showTooltip" x-transition style="display: none;" x-cloak
                            class="absolute left-full ml-2 top-1/2 -translate-y-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded whitespace-nowrap z-50">
                            Logout
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>