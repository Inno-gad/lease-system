<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-2xl font-bold mb-4">Add New Tenant</h2>

            <div class="bg-white shadow rounded p-6">
                <form action="{{ route('tenants.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name"
                               class="w-full border rounded p-2"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone"
                               class="w-full border rounded p-2"
                               value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email"
                               class="w-full border rounded p-2"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Unit</label>
                        <input type="text" name="unit"
                               class="w-full border rounded p-2"
                               value="{{ old('unit') }}">
                        @error('unit')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('tenants.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded">
                            Cancel
                        </a>

                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded">
                            Save Tenant
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>