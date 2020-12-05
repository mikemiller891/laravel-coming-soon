@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 focus:outline-none transition duration-150 ease-in-out
            text-sm font-medium leading-5 text-gray-900
            border-b-2 border-indigo-400 focus:border-indigo-700'
            : 'inline-flex items-center px-1 pt-1 focus:outline-none transition duration-150 ease-in-out
            text-sm font-medium leading-5 text-gray-400 focus:text-gray-700 hover:text-gray-700
            border-b-2 border-transparent focus:border-gray-700 hover:border-gray-700
            ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
