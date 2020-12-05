<div>
    <form wire:submit.prevent="subscribe">@csrf
        <div class="w-full text-center">
            <input autofocus type="text" wire:model="email"
                   placeholder="{{ _('Enter your email address.') }}"
                   class="w-1/2 text-xl italic px-4 rounded-l-lg placeholder-black bg-white text-black
                   focus:outline-none focus:ring-inset focus:ring"
            ><button type="submit" class="text-xl font-bold px-4 bg-gray-300 hover:bg-gray-700 text-gray-700 hover:text-gray-300 rounded-r-lg
            focus:outline-none focus:ring-inset focus:ring">{{ _('Notify Me') }}</button>
        </div>
        <div class="w-full text-center font-bold text-xl">
            &nbsp;
            @if (session()->has('success'))
                <span class="text-black">{{ _('Thanks for subscribing.') }}</span>
            @endif
            @if ($errors)
                <span class="text-red-800">{{ $errors->first() }}</span>
            @endif
            &nbsp;
        </div>
    </form>
</div>
