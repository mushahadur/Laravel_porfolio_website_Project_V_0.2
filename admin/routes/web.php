<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VisitorController;
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



Route::get('/',[HomeController::class, 'index'])->name('Home');
Route::get('/visitor-index',[VisitorController::class, 'visitorIndex'])->name('visitorIndex');

// Admin Panel service Management Route
Route::get('/service',[ServiceController::class, 'servicesIndex'])->name('service');
Route::get('/getServicesData',[ServiceController::class, 'getServicesData']);
Route::post('/serviceDelete',[ServiceController::class, 'ServiceDelete']);
Route::post('/getServiceDetails',[ServiceController::class, 'getServiceDetails']);
Route::post('/ServiceUpdate',[ServiceController::class, 'ServiceUpdate']);
Route::post('/ServiceAdd',[ServiceController::class, 'ServiceAdd']);


// Admin Panel Courses Management Route
Route::get('/courses',[CoursesController::class, 'coursesIndex'])->name('courses');
Route::get('/getCoursesData',[CoursesController::class, 'getCoursesData']);
Route::post('/getCoursesDetails',[CoursesController::class, 'getCoursesDetails']);
Route::post('/CoursesDelete',[CoursesController::class, 'CoursesDelete']);
Route::post('/CourseUpdate',[CoursesController::class, 'CourseUpdate']);
Route::post('/CoursesAdd',[CoursesController::class, 'CoursesAdd']);
