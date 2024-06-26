<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'P48InvestmentLtd') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        input:focus {
            border: 1px solid #009933 !important;
            outline: none;
        }
        .main-color{
            color:#009933;
        }
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-gray-900">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        <p class="underline main-color"><a href="{{ route('dashboard') }}">Home</a></p>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <hr>
        <footer class="text-center text-gray-500 p-4 mt-4">
          <div class="">
            <p class="text-center">
            @php echo date('Y') @endphp  P48 Investment Ltd. All Rights Reserved. 
          </p>
        </footer>
    </body>
</html>

@stack('scripts')