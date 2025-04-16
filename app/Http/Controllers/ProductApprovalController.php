<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductApprovalService;

class ProductApprovalController extends Controller {
    protected $productApprovalService;

    public function __construct(ProductApprovalService $productApprovalService){
        $this->productApprovalService = $productApprovalService;
    }

    public function index(){
        $products = $this->productApprovalService->getPendingProducts();
        return view('productApproval.index', compact('products'));
    }

    public function approve(Product $product){
        $this->productApprovalService->approveProduct($product);
        return redirect()->back()->with('success', 'Product approved successfully!');
    }

    public function reject(Product $product){
        $this->productApprovalService->rejectProduct($product);
        return redirect()->back()->with('success', 'Product rejected!');
    }
}
