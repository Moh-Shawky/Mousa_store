<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Home Routes
Route::get('/', [ProductController::class, 'index']);
Route::get('/home', [ProductController::class, 'index']);



Route::middleware(['auth'])->group(function () {

    // Products Routes
    Route::get('/products', [ProductController::class, 'products']);
    Route::get('/about', [ProductController::class, 'about']);
    Route::get('/contact', [ProductController::class, 'contact']);


    Route::middleware(['role:2'])->group(function () {
        // Products dashboard for admin
        Route::prefix('dashboard')->group(function () {
            Route::get('/products', [UserController::class, 'products']);
            Route::get('/createproduct', [ProductController::class, 'create']);
            Route::post('/storeproduct', [ProductController::class, 'store']);
            Route::get('/editproduct/{id}', [ProductController::class, 'edit']);
            Route::post('/updateproduct', [ProductController::class, 'update'])->name('updateproduct');
            Route::get('/deleteproduct/{id}', [ProductController::class, 'destory']);
        });
        // Admin Routes
        Route::get('/admin', [UserController::class, 'index']);
        Route::get('/edituser/{id}', [UserController::class, 'edit']);
    });
    // Regular User Routes
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/deleteuser/{id}', [UserController::class, 'delete']);
    Route::post('/updateuser', [UserController::class, 'update']);

});

// Login & register Routes
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/create', [UserController::class, 'create'])->name('create');


