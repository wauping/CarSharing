<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello, World!']);
});
Route::get('/car', [CarController::class, 'index']);
Route::get('/car/{id}', [CarController::class, 'show']);
Route::get('/rent', [RentController::class,'index']);
Route::get('/user', [UserController::class,'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('rent/create', [RentController::class,'create'])->middleware('auth');
Route::get('/rent/edit/{id}', [RentController::class, 'edit'])->middleware('auth');
Route::get('/rent/destroy/{id}', [RentController::class, 'destroy'])->middleware('auth');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/error', function(){
    return view('error', ['message' => session('message')]);
});

Route::post('/rent', [RentController::class,'store']);
Route::post('/rent/update/{id}', [RentController::class, 'update'])->middleware('auth');
Route::post('/auth', [LoginController::class,'authenticate']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
