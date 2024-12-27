<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::prefix("api")->group(function () {
    Route::apiResource('/product', ProductController::class );
    Route::apiResource('/review', ReviewController::class );
});

//Route::post("/product/{product}/addReview", ProductController::class . "addReview" );
//Route::get('/product', [ProductController::class, 'index']);
//Route::apiResource()
