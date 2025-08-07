<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Main Content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

            {{-- Sidebar --}}
            @include('dashboard.partials.sidebar')

            {{-- Table Content --}}
            <div class="flex-1 bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Admins Table</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="px-6 py-4">{{ $admin->id }}</td>
                                    <td class="px-6 py-4">{{ $admin->name }}</td>
                                    <td class="px-6 py-4">{{ $admin->email }}</td>
                                    <td class="px-6 py-4">{{ $admin->getRoleNames()->implode(', ') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admins.edit', $admin) }}" class="text-blue-500 hover:underline">Edit</a> |
                                        <form action="{{ route('admins.destroy', $admin) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this admin?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="px-6 py-4">
                                    <a href="{{ route('admins.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Admin</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>