<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\ExerciseController;


use App\Http\Controllers\FoodSystemController;

Route::resource('foodsystem', FoodSystemController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('gyms', GymController::class);
Route::resource('exercises', ExerciseController::class);
Route::get('/', function () {
    return view('admin.overview');
});
