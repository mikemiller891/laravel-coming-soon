<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visitors') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black">

        <x-dash.section>
            <x-dash.pane class="w-full">
                <table class="table-auto border-collapse border border-white mx-auto my-4">
                    <thead>
                        <tr>
                            <th class="border border-white">{{ __('Email') }}</th>
                            <th class="border border-white">{{ __('Date Created') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Models\Visitor::latest()->get() as $visitor)
                            <tr>
                                <td class="border border-white px-2">{{ $visitor->email }}</td>
                                <td class="border border-white px-2">{{ $visitor->created_at->format('m/d/Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-dash.pane>
        </x-dash.section>

    </div>
</x-app-layout>
