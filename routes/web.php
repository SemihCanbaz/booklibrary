<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login',[AuthController::class,'login'])->name('loginpage');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('registerpage');
Route::post('/register',[AuthController::class,'register'])->name('register');


Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::get('/kitaplar',[BookController::class,'index'])->name('books.index') ;
Route::get('/kitaplar/ekle',[BookController::class,'create'])->name('books.create') ;
Route::post('/kitaplar/ekle',[BookController::class,'store'])->name('books.store') ;
Route::get('/kitaplar/{id}',[BookController::class,'edit'])->name('books.edit') ;

});

