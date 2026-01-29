<x-admin-layout>
    <x-slot name="title">Sales History</x-slot>

    <div class="h-full overflow-y-auto">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Sales History</h2>
                        <p class="text-sm text-gray-500 mt-1">View all completed transactions</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Sales Table -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Date</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Transaction ID</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Customer</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Cashier</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Total</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-600">Method</th>
                                <th class="text-center py-4 px-6 text-xs font-semibold text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6 text-sm text-gray-600">
                                        {{ $sale->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-800">
                                        {{ $sale->transaction_code }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-600">
                                        {{ $sale->customer->name ?? 'Guest' }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-600">
                                        {{ $sale->user->name ?? 'Unknown' }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-800">
                                        Rp {{ number_format($sale->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="text-xs font-medium px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800 uppercase">
                                            {{ $sale->payment_method }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('sales.show', $sale) }}"
                                            class="inline-flex items-center justify-center p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="View Details">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-12 text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-medium">No sales found</p>
                                        <p class="text-sm mt-1">Sales made in the POS will appear here</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($sales->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $sales->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>