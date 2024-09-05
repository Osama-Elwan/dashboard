<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function(){
    Route::get('/',HomeController::class)->name('users.home');
    Route::controller(StudentController::class)->group(function(){
        Route::get('/users','index')->name('admin.users.index');
    });
});
