<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{

    public function getPublicProducts()
    {
        return Product::where('status', 'approved')->with(['seller', 'category', 'images'])->latest()->paginate(10);
    }

    public function searchAvailableProducts(array $filters)
    {
        $query = Product::where('status', 'approved')
            ->where('availability_status', 'available')
            ->with(['seller', 'category', 'images']);

        if (!empty($filters['name'])) {
            $query->where('title', 'ilike', '%' . $filters['name'] . '%');
        }

        if (isset($filters['is_free'])) {
            $query->where('is_free', $filters['is_free']);
        }

        if (!empty($filters['condition'])) {
            $query->where('condition', $filters['condition']);
        }

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query->latest()->paginate(10);
    }

    public function getSellerProducts($sellerId)
    {
        return Product::where('seller_id', $sellerId)->with(['category', 'images'])->latest()->get();
    }

    public function createProduct($sellerId, $data)
    {
        // Start a database transaction to ensure data consistency
        DB::beginTransaction();
        try {
            // 1. Create the product
            $product = Product::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'is_free' => $data['is_free'],
                'price' => $data['price'],
                'condition' => $data['condition'],
                'status' => 'pending',
                'category_id' => $data['category_id'],
                'seller_id' => $sellerId,
            ]);
            // 2. Handle image uploads
            if (!empty($data['images'])) {
                foreach ($data['images'] as $image) {
                    $path = $image->store('product_images', 'public');
                    $product->images()->create(['image_url' => $path]);
                }
            }
            // Commit the transaction if everything succeeds
            DB::commit();
        } catch (\Exception $e) {
            // Rollback on error
            DB::rollBack();
            throw $e; // Re-throw for error handling in the controller
        }
    }

    public function getProductById($id)
    {
        return Product::with(['seller', 'category', 'images'])->findOrFail($id);
    }

    public function updateProduct($productId, $sellerId, $data)
    {
        $product = Product::where('id', $productId)
            ->where('seller_id', $sellerId)
            ->firstOrFail();
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        DB::transaction(function () use ($product) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->image_url);
                $image->delete();
            }
            $product->delete();
        });
    }

    public function addImage($productId, $file)
    {
        $product = Product::findOrFail($productId);
        $path = $file->store('product_images', 'public');
        $product->images()->create([
            'image_url' => $path,
        ]);
    }

    public function deleteImage($imageId)
    {
        $image = ProductImage::findOrFail($imageId);
        Storage::disk('public')->delete($image->image_url);
        return $image->delete();
    }
}
