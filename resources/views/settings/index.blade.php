<x-admin-layout>
    <x-slot name="title">Settings</x-slot>

    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Store Settings</h2>
            <p class="text-sm text-gray-500 mt-1">Manage your store information and preferences</p>
        </div>

        @if(session('success'))
            <div
                class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <!-- Store Name -->
                    <div>
                        <label for="store_name" class="block text-sm font-medium text-gray-700 mb-1">Store Name</label>
                        <input type="text" name="store_name" id="store_name" value="{{ old('store_name', $storeName) }}"
                            required
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="My Awesome Store">
                        <p class="text-xs text-gray-500 mt-1">This name will appear on receipts and the dashboard.</p>
                    </div>

                    <!-- Store Phone -->
                    <div>
                        <label for="store_phone" class="block text-sm font-medium text-gray-700 mb-1">Store
                            Phone</label>
                        <input type="text" name="store_phone" id="store_phone"
                            value="{{ old('store_phone', $storePhone) }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="0812-3456-7890">
                    </div>

                    <!-- Store Address -->
                    <div>
                        <label for="store_address" class="block text-sm font-medium text-gray-700 mb-1">Store
                            Address</label>
                        <textarea name="store_address" id="store_address" rows="3"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Jl. Raya No. 123">{{ old('store_address', $storeAddress) }}</textarea>
                    </div>

                    <!-- Receipt Footer -->
                    <div>
                        <label for="receipt_footer" class="block text-sm font-medium text-gray-700 mb-1">Receipt Footer
                            Message</label>
                        <input type="text" name="receipt_footer" id="receipt_footer"
                            value="{{ old('receipt_footer', $receiptFooter) }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Thank you for shopping with us!">
                        <p class="text-xs text-gray-500 mt-1">Short message printed at the bottom of receipts.</p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium shadow-sm">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>