<aside class="w-64 bg-white shadow-md rounded-lg mr-6 md:block">
    <div class="p-6 text-lg font-bold border-b">Menu</div>
    <nav class="p-4 space-y-2">
        @can('admin.read')
            <a href="{{ route('admins.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">
                Admins
            </a>
        @endcan
        @can('product.read')
            <a href="{{ route('products.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">
                Products
            </a>
        @endcan
    </nav>
</aside>