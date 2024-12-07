<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DepartmentContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
// dump('step4');
Route::middleware('guest')->group(function(){

    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/handleRegister',[AuthController::class,'handleRegister'])->name('handleRegister');
    Route::post('/handleLogin',[AuthController::class,'handleLogin'])->name('handleLogin');
    Route::get('/logout',[AuthController::class,'logout'])->withoutMiddleware('guest')->name('logout');
});

Route::get('/',[SiteHomeController::class,'index'])->name('site.index');

Route::get('/about',[SiteHomeController::class,'about'])->name('site.about');



