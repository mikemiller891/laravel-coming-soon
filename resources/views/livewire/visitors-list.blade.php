<div class="grid gap-4 mb-8 md:grid-cols-2 xl:grid-cols-4">
    @foreach ($visitors as $visitor)
        <div class="px-4 py-2 bg-white rounded-lg shadow-sm">
            <p class="text-sm font-medium text-gray-600">{{ $visitor->email }}</p>
        </div>
    @endforeach
</div>
{{ $visitors->links() }}
