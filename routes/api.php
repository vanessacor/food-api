<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

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

Route::get('dishes', [DishController::class, 'index'])->name('index');
Route::get('dishes/{id}', [DishController::class, 'show'])->name('show');
Route::post('dishes/', [DishController::class, 'store'])->name('store');
Route::delete('dishes/{id}', [DishController::class, 'destroy'])->name('delete');
Route::put('dishes/{id}', [DishController::class, 'update'])->name('update');
