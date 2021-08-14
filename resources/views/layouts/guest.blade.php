<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cokorda Agung's Blog</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="h-full">
        <div class="bg-gray-50 min-h-screen flex flex-col">
            <nav class="bg-white dark:bg-gray-900 border-b border-gray-200">
                <div class="max-w-6xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <div class="text-gray-900">
                        <a href="{{ url('/') }}">Cokorda Agung</a>
                    </div>
                    @if (Route::has('login'))
                        <div class="hidden px-6 sm:flex items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                </a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                                @endif
                            @endauth
                            <a href="{{ url('/about') }}" class="ml-4 text-sm text-gray-700">About</a>
                        </div>
                    @endif
                </div>
            </nav>
            {{ $slot }}
        </div>
    </body>
</html>
