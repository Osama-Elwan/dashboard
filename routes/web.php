<?php

use App\Http\Controllers\DepartmentContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::get('/register',function(){
    return view('auth.register');
})->name('register');

Route::get('/',function(){
    return view('site.index');
})->name('site.index');
Route::get('/about',function(){
    return view('site.about');
})->name('site.about');


Route::prefix('admin')->group(function(){
    Route::get('/',HomeController::class)->name('users.home');
    Route::get('/department/{id}',[DepartmentContoller::class,'show']);
    Route::controller(StudentController::class)->group(function(){
        Route::get('/users','index')->name('users.index');
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
