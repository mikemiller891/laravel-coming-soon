<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <a href="{{ route('admin.visitors') }}"><x-card caption="Total subscribers" text="{{ \App\Models\Visitor::count() }}"></x-card></a>
                <a href="{{ route('admin.users') }}"><x-card caption="Total users" text="{{ \App\Models\User::count() }}"></x-card></a>
            </div>
        </div>
    </div>
</x-app-layout>
