<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingCrontoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/training',
    [TrainingCrontoller::class, 'index']
)->name('training.index');

Route::get(
    '/create-training',
    [TrainingCrontoller::class, 'create']
)->name('training.create');

Route::post(
    '/create-training',
    [TrainingCrontoller::class, 'store']
)->name('training.store');

Route::get(
    '/edit-training/{id}',
    [TrainingCrontoller::class, 'edit']
)->name('training.edit');

Route::post(
    '/edit-training/{id}',
    [TrainingCrontoller::class, 'update']
)->name('training.update');

Route::delete(
    '/delete-training/{id}',
    [TrainingCrontoller::class, 'destroy']
)->name('training.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get(
    "/users",
    [UserController::class, 'index_web']
)->name('users.index_web');


Route::get(
    "/users/update/{id}",
    [UserController::class, 'edit']
)->name('users.edit');

Route::post(
    "/users/update/{id}",
    [UserController::class, 'update']
)->name('users.update');

Route::get(
    "/users/update_picture/{id}",
    [UserController::class, 'update_picture']
)->name('users.update_picture');

Route::post(
    "/users/update_picture/{id}",
    [UserController::class, 'update_picture']
)->name('users.update_picture');


Route::delete(
    "/users/{id}",
    [UserController::class, 'destroy']
)->name('users.destroy');

Route::get(
    "/weather",
    [WeatherController::class, 'index']
)->name('weather.index');


Route::get(
    "/weather/search_city",
    [WeatherController::class, 'search_city']
)->name('weather.search_city');


Route::post(
    "/weather/list_city",
    [WeatherController::class, 'list_city']
)->name('weather.list_city');

// Route::get(
//     "/weather/list_city",
//     [WeatherController::class, 'list_city']
// )->name('weather.list_city');


Route::get(
    "/weather/city",
    [WeatherController::class, 'index_bis']
)->name('weather.index_bis');


Route::get(
    "/schedule",
    [ScheduleController::class, 'index']
)->name('schedule.index');


Route::get(
    "/schedule/create",
    [ScheduleController::class, 'create']
)->name('schedule.create');

Route::post(
    "/schedule/create",
    [ScheduleController::class, 'store']
)->name('schedule.store');

Route::get(
    "/schedule/edit/{id}",
    [ScheduleController::class, 'edit']
)->name('schedule.edit');

Route::post(
    "/schedule/edit/{id}",
    [ScheduleController::class, 'update']
)->name('schedule.update');

Route::delete(
    "/schedule/{id}",
    [ScheduleController::class, 'destroy']
)->name('schedule.destroy');

Route::get(
    "/reservation",
    [ReservationController::class, 'index']
)->name('reservation.index');

Route::get(
    "/reservation/create",
    [ReservationController::class, 'create']
)->name('reservation.create');

Route::post(
    "/reservation/create",
    [ReservationController::class, 'store']
)->name('reservation.store');

Route::get(
    "/reservation/edit/{id}",
    [ReservationController::class, 'edit']
)->name('reservation.edit');

Route::post(
    "/reservation/edit/{id}",
    [ReservationController::class, 'update']
)->name('reservation.update');

Route::delete(
    "/reservation/{id}",
    [ReservationController::class, 'destroy']
)->name('reservation.destroy');
