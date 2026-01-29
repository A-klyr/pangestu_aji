<x-admin-layout>
    <x-slot name="title">Analytics</x-slot>

    <div class="h-full overflow-y-auto p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Analytics Dashboard</h2>
            <p class="text-sm text-gray-500 mt-1">Overview of your store performance</p>
        </div>

        <!-- 1. Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Revenue Today -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Revenue Today</p>
                        <h3 class="text-2xl font-bold text-gray-800">Rp {{ number_format($todayRevenue, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Revenue Month -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-purple-100 rounded-lg text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Revenue This Month</p>
                        <h3 class="text-2xl font-bold text-gray-800">Rp {{ number_format($monthRevenue, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Total Transactions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-green-100 rounded-lg text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Transactions</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalTransactions) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- 2. Best Sellers -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Top 5 Best Sellers</h3>
                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">All Time</span>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($bestSellers as $item)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $item->product->name ?? 'Deleted Product' }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $item->total_qty }} Sold</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-700">
                                    Rp {{ number_format($item->total_revenue, 0, ',', '.') }}
                                </span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-4">No sales data yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- 3. Recent Transactions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Recent Transactions</h3>
                    <a href="{{ route('sales.index') }}"
                        class="text-sm text-blue-600 hover:text-blue-700 font-medium">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <tbody class="divide-y divide-gray-50">
                            @forelse($recentSales as $sale)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4">
                                        <p class="font-medium text-gray-800">{{ $sale->customer->name ?? 'Guest' }}</p>
                                        <p class="text-xs text-blue-500">{{ $sale->transaction_code }}</p>
                                    </td>
                                    <td class="p-4 text-right">
                                        <p class="font-bold text-gray-800">Rp
                                            {{ number_format($sale->total_price, 0, ',', '.') }}</p>
                                        <p class="text-xs text-gray-500">{{ $sale->created_at->diffForHumans() }}</p>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-8 text-center text-gray-500">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>