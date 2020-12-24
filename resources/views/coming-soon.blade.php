<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

<body class="h-screen w-screen bg-gray-200 flex flex-col lg:justify-center bg-cover bg-center bg-fixed"
      style="background-image:url(https://source.unsplash.com/random/?coffee);">

<div class="flex flex-row justify-center bg-white bg-opacity-75 lg:bg-opacity-0 h-screen lg:h-auto">
    <div class="lg:bg-white lg:bg-opacity-75 rounded-3xl p-8 lg:w-1/2 lg:shadow-2xl xl:w-1/3">
        <p class="text-center text-lg font-bold mb-8">{{ __('Coming soon') }}</p>
        <p class="text-center text-4xl italic mb-2 font-black">{{ config('app.name') }}</p>
        <p class="text-center text-sm mb-8">{{ __('a website') }}</p>
        <livewire:subscription-form />
    </div>

    @if (Route::has('login'))
        <div class="fixed top-0 right-0 pt-2 pr-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-xs font-thin underline">{{ __('Dashboard') }}</a>
            @else
                <a href="{{ route('login') }}" class="text-xs font-thin underline">{{ __('Log in') }}</a>
            @endauth
        </div>
    @endif
</div>

@stack('modals')

@livewireScripts

</body>
</html>
