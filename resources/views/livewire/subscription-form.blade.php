<div>
    <form wire:submit.prevent="subscribe">@csrf
        <div class="w-full text-center">
            <input autofocus type="text" wire:model="email"
                   placeholder="{{ _('Enter your email address.') }}"
                   class="w-1/2 text-xl italic px-4 rounded-l-lg placeholder-gray-600 focus:outline-none"
            ><button type="submit" class="text-xl font-bold px-4 bg-gray-500 text-gray-200 rounded-r-lg
                        hover:bg-gray-200 hover:text-gray-500 focus:outline-none">{{ _('Notify Me') }}</button>
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
