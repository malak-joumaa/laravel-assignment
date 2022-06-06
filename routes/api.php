<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/pal', [TestController::class, 'palindrome'])->name("palindrome");
Route::get('/seconds', [TestController::class, 'seconds'])->name("seconds");
Route::get('/getapi', [TestController::class, 'callApi'])->name("callApi");
Route::get('/beerApi', [TestController::class, 'beerApi'])->name("beerApi");
Route::get('/students', [TestController::class, 'students'])->name("students");
Route::get('/nominee', [TestController::class, 'nominee'])->name("nominee");