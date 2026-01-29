<x-admin-layout>
    <x-slot name="title">Transaction Details</x-slot>

    <div class="h-full overflow-y-auto p-6">
        <div class="max-w-3xl mx-auto space-y-6">
            <!-- Header/Navigation -->
            <div class="flex items-center justify-between">
                <a href="{{ route('sales.index') }}"
                    class="flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to History
                </a>
                <button onclick="window.print()"
                    class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print Receipt
                </button>
            </div>

            <!-- Receipt Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden print:shadow-none print:border-none">
                <!-- Receipt Header -->
                <div class="bg-gray-50 border-b border-gray-200 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Transaction #{{ $sale->transaction_code }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $sale->created_at->format('d Frank Y, H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-semibold">
                                Paid
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="p-6 grid grid-cols-2 gap-6 border-b border-gray-100">
                    <div>
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Customer</h4>
                        <p class="text-gray-800 font-medium">{{ $sale->customer->name ?? 'Guest Customer' }}</p>
                        @if($sale->customer)
                            <p class="text-sm text-gray-500">{{ $sale->customer->email ?? '-' }}</p>
                        @endif
                    </div>
                    <div class="text-right">
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Cashier</h4>
                        <p class="text-gray-800 font-medium">{{ $sale->user->name ?? 'Unknown' }}</p>
                    </div>
                </div>

                <!-- Items Table -->
                <div class="p-6">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-left text-xs font-semibold text-gray-500 uppercase border-b border-gray-200">
                                <th class="pb-3 pl-2">Item Details</th>
                                <th class="pb-3 text-right">Qty</th>
                                <th class="pb-3 text-right">Price</th>
                                <th class="pb-3 text-right pr-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($sale->saleItems as $item)
                                <tr>
                                    <td class="py-4 pl-2">
                                        <p class="font-medium text-gray-800">{{ $item->product->name ?? 'Deleted Product' }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $item->product->sku ?? '-' }}</p>
                                    </td>
                                    <td class="py-4 text-right text-gray-600">x{{ $item->quantity }}</td>
                                    <td class="py-4 text-right text-gray-600">Rp
                                        {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="py-4 text-right font-medium text-gray-800 pr-2">Rp
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-t border-gray-200">
                            <tr>
                                <td colspan="3" class="pt-4 text-right font-medium text-gray-600">Total Amount</td>
                                <td class="pt-4 text-right font-bold text-gray-900 text-lg pr-2">Rp
                                    {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pt-2 text-right text-sm text-gray-500">Payment Method</td>
                                <td class="pt-2 text-right text-sm font-medium text-gray-800 uppercase pr-2">
                                    {{ $sale->payment_method }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>