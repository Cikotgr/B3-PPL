<?php

use App\Http\Controllers\SuplierProfilesController;
use App\Http\Controllers\SupplierHomeController;
use App\Http\Controllers\SupplierProductsController;
use App\Http\Middleware\EnsureAuthSupplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::middleware(EnsureAuthSupplier::class)->group(function () {
    Route::prefix('profile')->name('profile.')->group(function (){
        Route::get('/', [SuplierProfilesController::class, 'index'])->name('index');
        Route::post('/store', [SuplierProfilesController::class, 'store'])->name('store');
        Route::get('/create',[SuplierProfilesController::class, 'create'])->name('create');
        Route::get('/edit/{id}',[SuplierProfilesController::class, 'edit'])->name('edit');
        Route::put('/update{id}',[SuplierProfilesController::class, 'update'])->name('update');
    });
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [SupplierProductsController::class, 'index'])->name('index');
        Route::get('/create', [SupplierProductsController::class, 'create'])->name('create');
        Route::post('/store', [SupplierProductsController::class, 'store'])->name('store');
        Route::get('/view{id}', [SupplierProductsController::class, 'show'])->name('show');
        Route::get('/edit{id}', [SupplierProductsController::class, 'edit'])->name('edit');
    });
    Route::get('/suplier/beranda', [SupplierHomeController::class, 'index'])->name('supplier.index');
});
