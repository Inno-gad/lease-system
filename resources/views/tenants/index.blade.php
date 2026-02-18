 <x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <h2 class="text-2xl font-bold">Tenants</h2>
                <a href="{{ route('tenants.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                    + Add Tenant
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded p-4">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">Name</th>
                            <th class="p-2 border">Phone</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Unit</th>
                            <th class="p-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tenants as $tenant)
                            <tr>
                                <td class="p-2 border">{{ $tenant->name }}</td>
                                <td class="p-2 border">{{ $tenant->phone }}</td>
                                <td class="p-2 border">{{ $tenant->email }}</td>
                                <td class="p-2 border">{{ $tenant->unit }}</td>
                                <td class="p-2 border">
                                    <a href="{{ route('tenants.edit', $tenant->id) }}"
                                       class="text-blue-600">Edit</a>

                                    <form action="{{ route('tenants.destroy', $tenant->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 ml-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4">
                                    No tenants found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
