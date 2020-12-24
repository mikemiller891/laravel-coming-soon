<!DOCTYPE html>
<html x-data="{dark_mode:false}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" :theme="dark_mode ? 'dark-mode' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="m-0 p-0 absolute top-0 left-0">
    <a href="#" @click="dark_mode = !dark_mode" class="">
        @svg('heroicon-s-sun', 'h-8, w-8 block')
    </a>
</div>
<div class="min-h-screen bg-gray-100">
    @livewire('navigation-dropdown')

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>


@stack('modals')

@livewireScripts
</body>
</html>
