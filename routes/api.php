<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'sayHi'])->name("say-hi");
Route::get('/pal', [TestController::class, 'palindrome'])->name("palindrome");
Route::get('/seconds', [TestController::class, 'seconds'])->name("seconds");
Route::get('/getapi', [TestController::class, 'callAPI'])->name("callAPI");