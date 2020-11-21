<x-guest-layout>
    <div
        class="h-screen w-screen overflow-none bg-gray-500 flex flex-col justify-center relative bg-cover bg-center bg-fixed"
        style="background-image:url(https://source.unsplash.com/random/?coffee);">

        <div class="flex flex-row justify-center">
            <div class="w-full mx-4 lg:w-1/2 bg-white bg-opacity-50 px-8 py-4 rounded-3xl inline-block shadow-2xl">

                <p class="text-xl font-black text-center">Coming Soon</p>
                <h1 class="text-3xl lg:text-6xl font-black text-center pt-8">{{ config('app.url') }}</h1>
                <p class="text-base text-center pb-16">A Website</p>
                <form method="POST" action="/">@csrf

                    <div class="w-full text-center">
                        <input autofocus type="text" name="email" id="email" placeholder="Enter your email address."
                               class="w-1/2 text-xl italic px-4 rounded-l-lg placeholder-gray-600 placeholder"
                        ><button type="submit" class="text-xl font-bold px-4 bg-gray-500 text-gray-200 rounded-r-lg
                        hover:bg-gray-200 hover:text-gray-500">Notify Me</button>
                    </div>

                    @if ($errors->any())
                        <div class="w-full text-center text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>

            </div>
        </div>

        @if (Route::has('login'))
            <div class="fixed top-0 right-0 pt-2 pr-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-xs underline">Dashboard</a>
                @else
                    {{-- <a href="{{ route('login') }}" class="text-xs underline">Login</a> --}}
                @endauth
            </div>
        @endif

    </div>
</x-guest-layout>
