<form wire:submit.prevent="subscribe">@csrf
    @if (!session()->has('success'))
        <div class="text-center">
            <input autofocus type="text" wire:model="email" dusk="email"
                   placeholder="{{ __('Enter your email address.') }}"
                   class="border-0 px-4 py-2 rounded-l-lg
                   focus:ring focus:ring-inset focus:ring-2 focus:ring-indigo-400"
            ><button type="submit" dusk="subscribe"
                     class="border-0 bg-indigo-200 px-4 py-2 rounded-r-lg
                     focus:ring focus:ring-inset focus:ring-2 focus:ring-indigo-400
                     hover:bg-indigo-100">{{ __('Notify Me') }}</button>
        </div>
    @endif
    @if (session()->has('success'))
        <p class="text-center font-bold italic" dusk="thanks">{{ __('Thanks for subscribing.') }}</p>
    @endif
    @error('email')<p class="text-center text-red-700 font-bold" dusk="error">{{ $message }}</p>@enderror
</form>
