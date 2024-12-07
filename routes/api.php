<?php

use App\Http\Controllers\Api\StudnetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/students',[StudnetController::class,'index']);
Route::get('/students/{id}',[StudnetController::class,'show']);