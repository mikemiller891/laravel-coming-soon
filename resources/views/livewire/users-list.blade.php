<div class="w-full overflow-hidden rounded-lg shadow-sm">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Verified</th>
                <th class="px-4 py-3">Admin</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y">
            @foreach ($users as $user)
                <tr class="text-gray-700">
                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">{{ $user->email_verified_at ? 'X' : '' }}</td>
                    <td class="px-4 py-3">{{ $user->hasRole('admin') ? 'X' : '' }}</td>
                    <td class="px-4 py-3"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>


