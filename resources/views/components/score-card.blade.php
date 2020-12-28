@props(['href', 'bg', 'fg', 'score', 'caption', 'icon'])
<a href="{{ $href ?? '#' }}">
    <div {{ $attributes->merge(['class' => 'sm:h-24 shadow-lg p-4 flex rounded-lg text-black hover:text-white transition ease-in-out']) }}>
        <div class="my-auto rounded-full h-8 w-8 flex flex-col justify-center bg-white">
            @svg($icon ?? 'heroicon-o-at-symbol', 'h-6 w-6 text-black bg-white block mx-auto my-auto')
        </div>
        <div class="mx-2 my-auto text-4xl font-mono">{{ $score ?? '??' }}</div>
        <div class="mx-2 my-auto font-black">{{ $caption ?? '??' }}</div>
    </div>
</a>
