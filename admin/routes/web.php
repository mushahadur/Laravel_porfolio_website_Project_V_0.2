<?php

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
Route::get('/service',[ServiceController::class, 'servicesIndex'])->name('service');
Route::get('/getServicesData',[ServiceController::class, 'getServicesData']);
Route::post('/serviceDelete',[ServiceController::class, 'ServiceDelete']);
