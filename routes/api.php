<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get(
    "/users/all",
    [
        UserController::class,
        'index'
    ]
)->name('users.all');

Route::get(
    "/users/{id}",
    [
        UserController::class, 'show'
    ]
)->name('users.show');

Route::get(
    "/users/{id}",
    [
        UserController::class,
        'delete'
    ]
)->name('users.delete');

Route::post(
    "/users",
    [
        UserController::class,
        'store'
    ]
)->name('users.store');
