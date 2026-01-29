<x-kasir-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('dashboard') }}"
                    class="p-2 bg-white rounded-lg shadow-sm border border-gray-200 hover:bg-gray-50 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Riwayat Transaksi Saya</h1>
                    <p class="text-gray-600">Daftar penjualan yang telah Anda lakukan.</p>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th
                                    class="text-left py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Kode Transaksi</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Pelanggan</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Metode</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Total</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Waktu</th>
                                <th
                                    class="text-center py-4 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($sales as $sale)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-bold text-blue-600">#{{ $sale->transaction_code }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $sale->customer->name ?? 'Guest' }}</td>
                                    <td class="py-4 px-6 text-sm">
                                        <span
                                            class="px-2 py-1 rounded-md text-[10px] font-bold uppercase {{ $sale->payment_method === 'cash' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                            {{ $sale->payment_method }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-sm font-bold text-gray-800">Rp
                                        {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-500">
                                        {{ $sale->created_at->format('d M Y, H:i') }}</td>
                                    <td class="py-4 px-6 text-center">
                                        <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"
                                            title="Print Kwitansi">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-medium">Belum ada transaksi</p>
                                            <p class="text-sm">Semangat jualan hari ini!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($sales->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        {{ $sales->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-kasir-layout>