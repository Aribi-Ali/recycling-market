<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductApprovalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...

        Route::resource('/posts', ProductController::class);
        Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
        Route::get('/', function () {
            $posts = \App\Models\Post::latest()->paginate(10);
            return view('home', compact('posts'));
        })->name("home");

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // Products
        Route::get("/products/create", [ProductController::class, "create"])->name("products.create");
        Route::get("/products", [ProductController::class, "index"])->name("products.index");
        // Route::post("/products", [ProductController::class, "store"])->name("products.store");
        Route::get("/products/search", [ProductController::class, "search"])->name("products.search");
        Route::get("/products/{productId}", [ProductController::class, "show"])->name("products.show");


        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');

            // Address
            Route::get("/addresses", [AddressController::class, "index"])->name("addresses.index");
            Route::post("/addresses/create", [AddressController::class, "store"])->name("addresses.store");
            Route::delete("/addresses/{addressId}", [AddressController::class, "destroy"])->name("addresses.destroy");
            Route::put('/addresses/{id}/default', [AddressController::class, 'setDefault'])->name('addresses.setDefault');

            // Products
            Route::get("/{userId}/products", [ProductController::class, "sellerProducts"])->name("seller.products.index");
            Route::post("/products", [ProductController::class, "store"])->name("seller.products.store");
            Route::put("/products/{productId}", [ProductController::class, "update"])->name("seller.products.update");
            Route::delete("/products/{productId}", [ProductController::class, "delete"])->name("seller.products.delete");

            // Category
            //Route::get("/categories", [CategoryController::class, 'index'])->name('admin.categories.index');

            // Order
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

            // Admin
            Route::prefix("admin")->group(function () {
                // Product
                Route::get("/products/approved", [ProductController::class, "adminIndex"])->name("admin.products.approved");
                Route::get('/products/pending', [ProductApprovalController::class, 'index'])->name('admin.products.pending');
                Route::get("/products/rejected", [ProductApprovalController::class, "getRejectedProducts"])->name("admin.products.rejected");
                Route::put('/products/{product}/approve', [ProductApprovalController::class, 'approve'])->name('admin.products.approve');
                Route::put('/products/{product}/reject', [ProductApprovalController::class, 'reject'])->name('admin.products.reject');

                // Category
                Route::get("/categories", [CategoryController::class, 'index'])->name('admin.categories.index');
                Route::post("/categories/create", [CategoryController::class, "store"])->name("admin.categories.store");
                Route::delete('/categories/{categoryId}', [CategoryController::class, "destroy"])->name("admin.categories.destroy");

                // Order
                Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
                Route::post('/orders/{id}/status', [OrderController::class, 'changeStatus'])->name('admin.orders.status');
                Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
            });
        });
        require __DIR__ . '/auth.php';
    }
);



Route::get('/api/wilayas/{wilaya}/dairas', [LocationController::class, 'getDairasByWilaya']);
Route::get('/api/dairas/{daira}/cities', [LocationController::class, 'getCitiesByDaira']);
