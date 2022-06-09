<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\JWTController;

Route::group(['prefix' => 'v1'], function(){
    Route::group(['prefix' => 'user'], function(){
        Route::get('/all_users/{id?}', [UserController::class, 'getAllUsers']);
        Route::post('/register/{user_type_id}', [UserController::class, 'signUp']);
    });

    Route::group(['prefix' => 'admin'], function(){
        // Route::get('/restaurants/{id?}', [AdminController::class, 'getAllRestos']);
        // Route::get('/search/{name}', [RestoController::class, 'getRestoByName']);
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