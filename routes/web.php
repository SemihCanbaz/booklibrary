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
  // Authenticate edilmiş route'lar
  Route::get('/kitaplar',[BookController::class,'index'])->name('books.index') ;
  Route::get('/kitaplar/ekle',[BookController::class,'create'])->name('books.create') ;
  Route::post('/kitaplar/ekle',[BookController::class,'store'])->name('books.store') ;
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('logout',[AuthController::class,'logout'])->name('logout');
});




Route::post('/upload-photo', function (Request $request) {
  if ($request->hasFile('photo')) {
    $photo = $request->file('photo');
    $photo->move(public_path('uploads'), $photo->getClientOriginalName());
  }
  
  // İşlem tamamlandıktan sonra yönlendirme yapabilirsiniz veya istediğiniz başka bir işlemi gerçekleştirebilirsiniz.
})->name('uploadPhoto');


Route::get('/photos', [App\Http\Controllers\PhotoController::class, 'index'])->name('photos.index');
