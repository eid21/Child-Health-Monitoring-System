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
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\GymController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\Admin\FoodSystemController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;



Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/messeges', [ContactController::class, 'index'])->name('contact.index');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');
Route::get('/subscribers', [SubscriptionController::class, 'index'])->name('subscriber.index');
Route::post('/recommend', [ChildController::class, 'recommend'])->name('recommend');




Route::get('/doctorss', [App\Http\Controllers\DoctorController::class, 'index'])->name('theme.doctors.index');
Route::get('/gymss', [App\Http\Controllers\GymController::class, 'index'])->name('theme.gyms.index');
Route::get('/exercisess', [App\Http\Controllers\ExerciseController::class, 'index'])->name('theme.exercises.index');
Route::get('/foodsystemss', [App\Http\Controllers\FoodSystemController::class, 'index'])->name('theme.foodsystem.index');





Route::controller(ThemeController::class)->name('theme.')->group(function(){
Route::get('/','index')->name('index');
Route::get('/blog','blog')->name('blog');
Route::get('/services','services')->name('services');
Route::get('/contact','contact')->name('contact');
Route::get('/about','about')->name('about');
Route::get('/blog-details', 'blogDetails')->name('blog-details');
});
Route::post('subscriber/store',[SubscriberController::class ,'store'])->name('subscriber.store');
Route::resource('foodsystem', FoodSystemController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('gyms', GymController::class);
Route::resource('exercises', ExerciseController::class);
Route::get('/dashboard', function () {
    return view('admin.overview');
});
