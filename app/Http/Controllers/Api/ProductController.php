<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Product;
use App\Traits\ResponseTrait;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\WishlistItemResource;

class ProductController extends Controller
{
    use ResponseTrait;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $products = $this->service->getProducts();
        return $this->respondWithCollection($products, 'Products retrieved successfully', ProductResource::class);
    }

    public function show(Product $product)
    {
        try {
            return $this->respondWithResource($product, 'Product retrieved successfully', ProductResource::class);
        } catch (Exception $e) {
            return $this->returnErrorResponse(null, $e->getMessage(), 404);
        }
    }

    public function wishlist(Product $product)
    {
        try {
            $wishlistItems = $this->service->wishlist($product);
            return $this->respondWithCollection($wishlistItems, 'Wishlist updated successfully', WishlistItemResource::class);
        } catch (Exception $e) {
            return $this->returnErrorResponse(null, $e->getMessage(), 404);
        }
    }
}
