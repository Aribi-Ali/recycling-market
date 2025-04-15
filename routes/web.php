<?php

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\LocationController;
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

        Route::resource('posts', ProductController::class);
        Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
        Route::get('/', function () {
            return view('home');
        })->name("home");

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // Products
        Route::get("/products", [ProductController::class, "index"])->name("products.index");
        Route::get("/products/search", [ProductController::class, "search"])->name("products.search");
        Route::get("/products/{productId}", [ProductController::class, "show"])->name("products.show");


        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            // Products
            Route::middleware("role:seller")->prefix("dashboard")->group(function () {
                Route::get("/products", [ProductController::class, "sellerProducts"])->name("dashboard.products.index");
                Route::post("/products", [ProductController::class, "store"])->name("dashboard.products.store");
                Route::put("/products/{productId}", [ProductController::class, "update"])->name("dashboard.products.update");
                Route::delete("/products/{productId}", [ProductController::class, "delete"])->name("dashboard.products.delete");
            });
        });
        require __DIR__ . '/auth.php';
    }
);
