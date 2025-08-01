<?php

/**
 * Web Routes
 * 
 * Here is where you can register web routes for your application.
 * These routes are loaded by the RouteServiceProvider within a group
 * which contains the "web" middleware group.
 */

use Refynd\Http\RouteFacade as Route;
use App\Controllers\HomeController;
use App\Controllers\ApiController;

// Home page
Route::get('/', [HomeController::class, 'index']);

// About page
Route::get('/about', [HomeController::class, 'about']);

// Contact routes
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'submitContact']);

// API routes
Route::group(['prefix' => 'api'], function() {
    Route::get('/status', [ApiController::class, 'status']);
    Route::get('/users', [ApiController::class, 'users']);
    Route::post('/users', [ApiController::class, 'createUser']);
});

// Catch-all for 404
Route::any('/{path}', [HomeController::class, 'notFound'])->where('path', '.*');
