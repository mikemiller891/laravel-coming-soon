<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribers') }} <a href="{{ route('admin.visitors.export') }}" class="bg-indigo-100 rounded-full inline-block px-4 py-0 border-black border hover:bg-indigo-300">Export</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:visitors-list />
        </div>
    </div>
</x-app-layout>
