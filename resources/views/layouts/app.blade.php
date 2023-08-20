<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-gray-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('customer-scripts')
    </head>
    <body class="min-h-screen">
        <div x-data="{ menuVisibility: false }">
            <x-side-bar />

            <div class="flex flex-col md:pl-64">
                <x-navigation />

                <main class="flex-1">
                    <div class="py-6">
                        {{ $slot }}
                    </div>
                </main>
            </div>
            
        </div>
        @livewireScriptConfig 
    </body>
</html>
