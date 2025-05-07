<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Notifications\ProductApprovedNotification;

class ProductApprovalService{
    public function getPendingProducts(){
        $products = Product::where('status', 'pending')->with(['seller', 'category', 'images'])->latest()->get();
        return ProductResource::collection($products);
    }

    public function approveProduct($product){
        $product->status = 'approved';
        $product->save();

        // Send notification
        $user = $product->user;
        $user->notify(new ProductApprovedNotification($product));
    }

    public function rejectProduct($product){
        $product->status = 'rejected';
        $product->save();
    }
}
