<?php

use App\Http\Controllers\HomeindustriProfilesController;
use App\Http\Middleware\EnsureAuthHomeindustri;
use App\Models\HomeindustriProfile;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureAuthHomeindustri::class)->group(function (){
    Route::prefix('profile')->name('profile.')->group(function (){
        Route::get('/', [HomeindustriProfilesController::class, 'index'])->name('index');
        Route::post('/store', [HomeindustriProfilesController::class, 'store'])->name('store');
        Route::get('/create',[HomeindustriProfilesController::class, 'create'])->name('create');
        Route::get('/edit/{id}',[HomeindustriProfilesController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',[HomeindustriProfilesController::class, 'update'])->name('update');
    });
});
