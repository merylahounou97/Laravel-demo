<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingCrontoller;

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
