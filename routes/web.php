<?php

use App\Http\Controllers\IndoRegionController;
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

Route::post('/getregency',[IndoRegionController::class, 'getregency'])->name('getregency');


// Route::get('/post',[PostsController::class, 'index'])->name('post.index');
