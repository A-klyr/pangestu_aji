<x-kasir-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Simple Header with Logout -->
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-gray-600 mt-1">Selamat bekerja, semoga harimu menyenangkan.</p>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ now()->format('l, d F Y') }}</p>
                        <p class="text-xs text-gray-500">Shift Pagi</p>
                    </div>

                    <!-- Logout Button (Moved here since navbar is gone) -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-red-600 hover:text-red-800 font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Action Area -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <!-- Primary Action: Start POS -->
                <a href="{{ route('kasir.pos') }}"
                    class="md:col-span-2 group relative overflow-hidden bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white opacity-10 rounded-full group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="relative p-8 h-full flex flex-col justify-center items-start">
                        <div class="bg-white/20 p-3 rounded-xl mb-4 text-white">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">Buka Kasir</h2>
                        <p class="text-blue-100 text-lg mb-6 max-w-md">Mulai proses transaksi penjualan baru.</p>

                        <div
                            class="inline-flex items-center gap-2 bg-white text-blue-700 px-6 py-3 rounded-lg font-bold text-sm shadow-sm group-hover:bg-blue-50 transition-colors">
                            <span>Mulai Sekarang</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Secondary Actions -->
                <div class="grid grid-rows-2 gap-6">
                    <!-- Transaction History -->
                    <a href="{{ route('kasir.history') }}"
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-purple-200 hover:shadow-md transition-all flex items-center gap-4 group">
                        <div
                            class="p-3 bg-purple-50 text-purple-600 rounded-xl group-hover:bg-purple-100 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Riwayat Transaksi</h3>
                            <p class="text-sm text-gray-500">Cek penjualan hari ini</p>
                        </div>
                    </a>

                    <!-- Profile Settings -->
                    <a href="{{ route('profile.edit') }}"
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-gray-300 hover:shadow-md transition-all flex items-center gap-4 group">
                        <div class="p-3 bg-gray-50 text-gray-600 rounded-xl group-hover:bg-gray-100 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Profil Saya</h3>
                            <p class="text-sm text-gray-500">Pengaturan akun</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Operational Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Important Notice / Low Stock -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <h3 class="font-bold text-gray-800">Perhatian (Stok Menipis)</h3>
                    </div>

                    @if($lowStockItems->count() > 0)
                        <div class="space-y-3">
                            @foreach($lowStockItems as $item)
                                <div
                                    class="flex items-center justify-between p-3 bg-orange-50 rounded-lg border border-orange-100">
                                    <span class="text-sm font-medium text-gray-700">{{ $item->name }}</span>
                                    <span
                                        class="bg-white text-orange-700 px-2 py-1 rounded text-xs font-bold border border-orange-200">
                                        Sisa: {{ $item->stock }}
                                    </span>
                                </div>
                            @endforeach
                            <p class="text-xs text-gray-500 mt-2 text-center">Harap lapor ke admin untuk restock.</p>
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-6 text-gray-400">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm">Semua stok aman!</p>
                        </div>
                    @endif
                </div>

                <!-- Simple Stats -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-sm text-white p-6">
                    <h3 class="font-bold text-lg mb-6">Ringkasan Hari Ini</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                            <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Total Transaksi</p>
                            <p class="text-2xl font-bold">{{ $totalTransactions }}</p>
                            <p class="text-[10px] text-gray-400 mt-1">Hari ini</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                            <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Omzet Sementara</p>
                            <p class="text-2xl font-bold text-green-400">Rp
                                {{ number_format($todayRevenue, 0, ',', '.') }}</p>
                            <p class="text-[10px] text-gray-400 mt-1">Semangat jualan!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-kasir-layout>