<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CrudApp') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Session Messages --}}
            @if (session()->has('message'))
                <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-4 shadow-md max-w-xs absolute right-0 mr-4">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @elseif (session()->has('error'))
                <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg mb-4 shadow-md max-w-xs absolute right-0 mr-4">
                    <strong class="font-bold">Failed!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg mb-4 shadow-md max-w-xs absolute right-0 mr-4">
                                <strong class="font-bold">Failed!</strong>
                                <span class="block sm:inline">{{ $error }}</span>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Page Content -->
            <main>
                <!-- Custom Loader HTML -->
                <div id="loader" style="display: none;">
                    <div class="spinner"></div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
