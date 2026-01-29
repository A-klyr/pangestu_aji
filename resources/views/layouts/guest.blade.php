<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        [x-cloak] {
            display: none !important;
        }

        .bg-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.2) 0, transparent 50%),
                radial-gradient(at 50% 0%, rgba(124, 58, 237, 0.2) 0, transparent 50%),
                radial-gradient(at 100% 0%, rgba(219, 39, 119, 0.2) 0, transparent 50%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-pattern min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md animate__animated animate__fadeIn">
        <div class="text-center mb-8">
            <div class="inline-flex p-4 rounded-2xl bg-blue-600/20 mb-4 shadow-xl shadow-blue-500/10">
                <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">POS <span class="text-blue-500">Tracker</span>
            </h1>
            <p class="text-gray-400 mt-2">Selamat datang kembali, silakan login.</p>
        </div>

        <div class="glass rounded-3xl p-8 shadow-2xl overflow-hidden border border-white/10">
            {{ $slot }}
        </div>

        <div class="text-center mt-8 text-gray-500 text-sm">
            &copy; {{ date('Year') }} POS Tracker System. All rights reserved.
        </div>
    </div>
</body>

</html>