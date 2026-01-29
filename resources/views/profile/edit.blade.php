@php
    $layout = Auth::user()->role === 'admin' ? 'admin-layout' : 'kasir-layout';
    $backRoute = Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard');
@endphp

<x-dynamic-component :component="$layout">
    <x-slot name="title">Profile</x-slot>
    <div class="h-full overflow-y-auto">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200">
            <div class="px-6 py-4">
                <div class="flex items-center gap-4">
                    <a href="{{ $backRoute }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Profile</h2>
                        <p class="text-sm text-gray-500 mt-1">Manage your account settings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>