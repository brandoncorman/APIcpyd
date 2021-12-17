<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScrapingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('grupo-c/')->group(function () {
    // Public routes
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // Protected routes
    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::get('climas', [ScrapingController::class, 'scraper'])->name('climas');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});