<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        
            {{-- Sidebar --}}
            @include('dashboard.partials.sidebar')

            {{-- Main Content --}}

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @can('product.create')
                    <div class="mb-4">
                        <a href="{{ route('products.create') }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Add Product
                        </a>
                    </div>
                @endcan

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Description</th>
                                <th class="px-6 py-3">Price</th>
                                <th class="px-6 py-3">Image</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ Str::limit($product->description, 50) }}</td>
                                    <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                class="w-16 h-16 object-cover rounded" />
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        @can('product.update')
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="text-blue-500 hover:underline">Edit</a>
                                        @endcan
                                        @can('product.delete')
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                class="inline-block" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>