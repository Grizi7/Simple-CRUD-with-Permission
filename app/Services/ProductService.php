<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getProducts()
    {
        $query = Product::query()
            ->orderBy('created_at', 'desc');

        return $query->paginate(10);
    }

    public function createProduct(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('products', 'public');
        }
        $data['slug'] = Str::slug($data['name']);
        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        if (isset($data['image'])) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $data['image']->store('products', 'public');
        }
        $data['slug'] = Str::slug($data['name']);
        return $product->update($data);
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
    }
}
