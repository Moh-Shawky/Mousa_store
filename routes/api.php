<?php

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Route;
use App\Repositories\ProductRepository;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductRepository::class);
Route::resource('user', UserRepository::class);



// third party API using Fake store API
Route::get('fakeapi',[ProductAPIController::class,'index']);
Route::get('fakeapi/{id}',[ProductAPIController::class,'show']);
Route::get('fakeapi/category/{category}',[ProductAPIController::class,'getProductsByCategory']);
Route::post('fakeapi',[ProductAPIController::class,'store']);
Route::put('fakeapi/{id}',[ProductAPIController::class,'update']);
Route::delete('fakeapi/{id}',[ProductAPIController::class,'delete']);




