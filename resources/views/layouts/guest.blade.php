<!DOCTYPE html>
<html x-data="{dark_mode:false}" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      :theme="dark_mode ? 'dark-mode' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>
<body>
<div class="m-0 p-0 absolute top-0 left-0">
    <a href="#" @click="dark_mode = !dark_mode" class="">
        @svg('heroicon-s-sun', 'h-8, w-8 block')
    </a>
</div>
<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
</body>
</html>
