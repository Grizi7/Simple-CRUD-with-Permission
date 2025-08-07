<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Notifications\WishlistUpdateNotification;

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
            $data['image'] = $data['image']->store('images/products', 'public');
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
            $data['image'] = $data['image']->store('images/products', 'public');
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

    public function wishlist(Product $product)
    {
        $user = auth()->user()->load('wishlistItems');
        $wishlistItem = $user->wishlistItems()->where('product_id', $product->id)->first();
        
        if ($wishlistItem) {
            $wishlistItem->delete();
        }else {
            $wishlistItem = $user->wishlistItems()->create(['product_id' => $product->id]);
        }

        $user->notify(new WishlistUpdateNotification($user, $product));
        return $user->wishlistItems()->get();
    }
}
