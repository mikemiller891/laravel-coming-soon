<x-guest-layout>
    <div
        class="h-screen w-screen overflow-none bg-gray-500 flex flex-col justify-center relative bg-cover bg-center bg-fixed"
        style="background-image:url(https://source.unsplash.com/random/?coffee);">

        <div class="flex flex-row justify-center">
            <div class="w-full mx-4 lg:w-1/2 bg-white bg-opacity-50 px-8 py-4 rounded-3xl inline-block shadow-2xl">
                <p class="text-xl font-black text-center">{{ _('Coming Soon') }}</p>
                <h1 class="text-3xl lg:text-6xl font-black text-center pt-8">{{ config('app.name') }}</h1>
                <p class="text-base text-center pb-16">{{ _('A Website') }}</p>

                <livewire:subscription-form />

            </div>
        </div>

        @if (Route::has('login'))
            <div class="fixed top-0 right-0 pt-2 pr-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-xs underline">{{ _('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs underline">{{ _('Log in') }}</a>
                @endauth
            </div>
        @endif

    </div>
</x-guest-layout>
