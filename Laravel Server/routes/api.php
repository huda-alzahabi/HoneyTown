<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\JWTController;

Route::group(['prefix' => 'v1'], function(){
    Route::group(['prefix' => 'user'], function(){
       Route::get('/all_items', [UserController::class, 'getAllItems']);
       Route::get('/favorites', [UserController::class, 'getFavoriteItems']);
       Route::post('/add_to_favorites', [UserController::class, 'addToFavorites']);
       Route::post('/items_by_category', [UserController::class, 'getItemsByCategory']);

    });

    Route::group(['prefix' => 'admin'], function(){
        Route::post('/add_category', [AdminController::class, 'addCategory']);
        Route::post('/add_item', [AdminController::class, 'addItem']);
    });

    Route::group(['middleware' => 'api'], function($router) {
        Route::post('/register', [JWTController::class, 'register']);
        Route::post('/login', [JWTController::class, 'login']);
        Route::post('/logout', [JWTController::class, 'logout']);
        Route::post('/refresh', [JWTController::class, 'refresh']);
        Route::post('/profile', [JWTController::class, 'profile']);
    });
});