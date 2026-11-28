<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('vouchers', VoucherController::class);
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customer-directory', [CustomerController::class, 'directory'])->name('customers.directory');
    Route::get('/shipping-directory', [CustomerController::class, 'shipping'])->name('customers.shipping');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::post('/customers-reset', [CustomerController::class, 'resetAll'])->name('customers.reset');
    Route::resource('shipments', ShipmentController::class)->except(['show']);

    Route::view('/catalog', 'arman_catalog.index')->name('catalog.index');
    Route::view('/products', 'arman_catalog.products')->name('catalog.products');
    Route::view('/products/nike-air-max', 'arman_catalog.product-detail')->name('catalog.nike');
    Route::view('/products/adidas-ultraboost', 'arman_catalog.adidas-detail')->name('catalog.adidas');
    Route::view('/brands', 'arman_catalog.brands')->name('catalog.brands');
});

require __DIR__.'/auth.php';
