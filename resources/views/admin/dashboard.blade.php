<x-admin-layout>
    <x-slot name="title">Dashboard Admin</x-slot>
    <div class="h-full overflow-y-auto" x-data="{ notificationsOpen: false }">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-sm text-gray-500 mt-1">Welcome back! Here's what's happening today.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search..."
                                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                        </div>

                        <!-- Notifications Bell -->
                        <div class="relative">
                            <button @click="notificationsOpen = !notificationsOpen"
                                class="p-2 rounded-lg hover:bg-gray-100 relative">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                @if($lowStockCount > 0)
                                    <span
                                        class="absolute top-1 right-1 w-4 h-4 bg-red-500 text-white text-[10px] flex items-center justify-center rounded-full font-bold">
                                        {{ $lowStockCount > 9 ? '9+' : $lowStockCount }}
                                    </span>
                                @endif
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="notificationsOpen" @click.away="notificationsOpen = false" x-cloak
                                class="absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-xl shadow-xl z-20 overflow-hidden">
                                <div
                                    class="px-4 py-3 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                                    <h3 class="font-bold text-gray-800 text-sm">Notifications</h3>
                                    <span class="text-[10px] uppercase font-bold text-blue-600">Low Stock Alert</span>
                                </div>
                                <div class="max-h-64 overflow-y-auto">
                                    @forelse($lowStockItems as $item)
                                        <a href="{{ route('products.edit', $item) }}"
                                            class="flex items-start gap-3 p-4 hover:bg-gray-50 border-b border-gray-50 last:border-0 transition-colors">
                                            <div class="p-2 bg-orange-100 text-orange-600 rounded-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-semibold text-gray-800">{{ $item->name }}</p>
                                                <p class="text-xs text-red-500 font-medium mt-0.5">Stock left:
                                                    {{ $item->stock }}</p>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="p-8 text-center text-gray-500">
                                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                </path>
                                            </svg>
                                            <p class="text-xs">All items are in healthy stock!</p>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="px-4 py-2 border-t border-gray-100 text-center bg-gray-50">
                                    <a href="{{ route('products.index', ['stock' => 'low']) }}"
                                        class="text-xs text-blue-600 font-bold hover:underline">View All Low Stock</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('kasir.pos') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            + New Sale
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Today's Revenue -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-blue-500 p-3 rounded-lg text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Today's Revenue</h3>
                    <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500 mt-2">{{ $todayTransactions }} transactions today</p>
                </div>

                <!-- Total Products -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-green-500 p-3 rounded-lg text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Total Products</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($totalProducts) }}</p>
                    <p class="text-xs text-gray-500 mt-2">Active items in catalog</p>
                </div>

                <!-- Customers -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-purple-500 p-3 rounded-lg text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Total Customers</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($totalCustomers) }}</p>
                    <p class="text-xs text-gray-500 mt-2">Loyal customer base</p>
                </div>

                <!-- Low Stock -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-orange-500 p-3 rounded-lg text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        @if($lowStockCount > 0)
                            <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Alert</span>
                        @endif
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Low Stock Items</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $lowStockCount }}</p>
                    <p class="text-xs text-gray-500 mt-2">Need restock soon</p>
                </div>
            </div>

            <!-- Sales Chart -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Sales Analytics</h3>
                        <p class="text-sm text-gray-500">Last 7 days performance</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 text-xs font-medium bg-blue-600 text-white rounded-lg">7 Days</button>
                        <button class="px-3 py-1 text-xs font-medium text-gray-600 hover:bg-gray-100 rounded-lg">30
                            Days</button>
                        <button class="px-3 py-1 text-xs font-medium text-gray-600 hover:bg-gray-100 rounded-lg">90
                            Days</button>
                    </div>
                </div>

                <!-- Chart Container -->
                <div class="h-80">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Transactions & Top Products -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Transactions -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-800">Recent Transactions</h3>
                            <a href="{{ route('sales.index') }}"
                                class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
                                View All
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-600">Order ID</th>
                                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-600">Customer</th>
                                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-600">Items</th>
                                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-600">Amount</th>
                                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-600">Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($recentTransactions as $tx)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6 text-sm font-bold text-blue-600">#{{ $tx->transaction_code }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-800">{{ $tx->customer->name ?? 'Guest' }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-500">{{ $tx->saleItems->count() }} items</td>
                                        <td class="py-4 px-6 text-sm font-bold text-gray-800">Rp
                                            {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                                        <td class="py-4 px-6 text-xs text-gray-400">{{ $tx->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-8 text-center text-gray-500">No transactions yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Top Products</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @forelse($topProducts as $idx => $tp)
                            <div
                                class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer border border-transparent hover:border-gray-100">
                                <div
                                    class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                                    #{{ $idx + 1 }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-gray-800 truncate">
                                        {{ $tp->product->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-gray-500">{{ $tp->total_qty }} sold</p>
                                </div>
                                <span class="text-sm font-bold text-gray-800">Rp
                                    {{ number_format($tp->total_revenue, 0, ',', '.') }}</span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-8">No summary data yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        {
                            label: 'Revenue',
                            data: [3200000, 4100000, 3800000, 5200000, 4500000, 6100000, 4200000],
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: 'rgb(59, 130, 246)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Transactions',
                            data: [32, 41, 38, 52, 45, 61, 42],
                            borderColor: 'rgb(16, 185, 129)',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: 'rgb(16, 185, 129)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    size: 12,
                                    weight: '500'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            borderWidth: 1,
                            titleFont: {
                                size: 13,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 12
                            },
                            callbacks: {
                                label: function (context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        if (context.datasetIndex === 0) {
                                            label += 'Rp ' + (context.parsed.y / 1000000).toFixed(1) + 'M';
                                        } else {
                                            label += context.parsed.y + ' orders';
                                        }
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + (value / 1000000) + 'M';
                                },
                                font: {
                                    size: 11
                                },
                                color: '#6B7280'
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            grid: {
                                drawOnChartArea: false,
                            },
                            ticks: {
                                callback: function (value) {
                                    return value;
                                },
                                font: {
                                    size: 11
                                },
                                color: '#6B7280'
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                font: {
                                    size: 11,
                                    weight: '500'
                                },
                                color: '#6B7280'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>