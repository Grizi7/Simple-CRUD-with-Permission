<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Admin') }}
        </h2>
    </x-slot>

    {{-- Main Content --}}
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ old('name', $admin->name) }}">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ old('email', $admin->email) }}">
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Leave blank to keep current password">
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Leave blank to keep current password">
                    </div>

                    {{-- Role --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700" for="role">Role</label>
                        <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $admin->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Submit --}}
                    <div class="flex justify-end items-center space-x-4 mt-6">
                        <a href="{{ route('admins.index') }}" class="text-gray-600 hover:underline">Cancel</a>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Update Admin
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>