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


Route::middleware(['auth','IsAdmin'])->prefix('admin')->group(function(){
    Route::get('/',HomeController::class)->name('users.home');
    Route::get('/department/{id}',[DepartmentContoller::class,'show']);
    Route::controller(StudentController::class)->group(function(){
        Route::get('/users','index')->middleware('IsAdmin')->name('users.index');
        Route::get('/users/create','create')->name('users.create');
        Route::get('users/archive','archive')->name('users.archive');
        Route::get('users/{id}','show')->name('users.show');
        Route::post('/users','store')->name('users.store');
        Route::get('users/{id}/edit','edit')->name('users.edit');
        Route::put('users/{id}','update')->name('users.update');
        Route::delete('/users/{id}','destroy')->name('users.destroy');
        Route::delete('/users/{id}/delete','forceDelete')->name('users.forceDelete');
        Route::post('/users/{id}/restore','restore')->name('users.restore');
        Route::post('/users/{id}/courses','addCourses')->name('users.addCourses');

    });
});
