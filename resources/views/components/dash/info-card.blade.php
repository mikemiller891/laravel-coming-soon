@props(['caption', 'href', 'color'])
<div class="p-4">
    @if ($href ?? false)
        <a href="{{ $href }}">
    @endif
    <div class="px-4 py-2 h-12 bg-{{ $color }}-100{{ $color }}-900 rounded-lg text-black shadow-xl overflow-hidden">
        <div class="text-center">{{ $caption }}</div>
    </div>
    @if ($href ?? false)
        </a>
    @endif
</div>
{{--
bg-gray-100
bg-red-100
bg-yellow-100
--}}
