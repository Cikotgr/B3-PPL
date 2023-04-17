<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SuplierProfilesController;
use App\Models\SuplierProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/supplier_profile', [SuplierProfilesController::class, 'index'])->name('supplier_profile.index');
Route::post('/supplier_profile_store', [SuplierProfilesController::class, 'store'])->name('supplier_profile.store');
Route::get('/suplier_profile_create',[SuplierProfilesController::class, 'create'])->name('supplier_profile.create');
// Route::get('/post',[PostsController::class, 'index'])->name('post.index');
