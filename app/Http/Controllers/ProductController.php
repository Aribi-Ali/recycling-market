<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
     public function create(){
            $categories =Category::all();
            return view('products.create', compact('categories'));
        }
    public function index(){
        $products = $this->productService->getPublicProducts();

        return view('products.index', compact('products'));
    }

    public function adminIndex(){
        $products = $this->productService->getPublicProducts();
        return view('products.approved', compact('products'));
    }

    public function search(Request $request){
        $filters = $request->only([
            'name',
            'is_free',
            'condition',
            'category_id'
        ]);

        $products = $this->productService->searchAvailableProducts($filters);
        return view('products.index', compact('products'));
    }

    public function sellerProducts(){
        $sellerId = Auth::id();
        $products = $this->productService->getSellerproducts($sellerId);
        return view('products.index', compact('products'));
    }

    public function store(ProductRequest $request){
        $data = $request->all();
        $data['is_free'] = $request->has('is_free') ? true : false;
        $this->productService->createproduct(Auth::id(), $data);
        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function show(Product $productId){
        $product = $this->productService->getproductById($productId);
        return view('products.show', compact('product'));
    }

    public function update(ProductRequest $request, Product $productId){
        $this->productService->updateproduct($productId, Auth::id(), $request);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function delete(Product $productId){
        $this->productService->deleteproduct($productId);
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function uploadImage(Product $productId, Request $request){
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $this->productService->addImage($productId, $request->file('image'));
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function deleteImage($imageId){
        $this->productService->deleteImage($imageId);
    }
}
