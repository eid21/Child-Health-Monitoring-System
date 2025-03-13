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
use App\Http\Controllers\ThemeController;



use App\Http\Controllers\FoodSystemController;
Route::controller(ThemeController::class)->name('theme.')->group(function(){
Route::get('/','index')->name('index');
Route::get('/blog','blog')->name('blog');
Route::get('/services','services')->name('services');
Route::get('/contact','contact')->name('contact');
Route::get('/about','about')->name('about');
Route::get('/blog-details', 'blogDetails')->name('blog-details');
});
Route::resource('foodsystem', FoodSystemController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('gyms', GymController::class);
Route::resource('exercises', ExerciseController::class);
Route::get('/dashboard', function () {
    return view('admin.overview');
});
