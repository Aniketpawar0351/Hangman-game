<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\hanggame;
use App\Http\Controllers\fetch;
use App\Http\Controllers\resetGame;

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

Route::get('/',[fetch::class,'fetch_word']);



//if user enter wrong uri
Route::fallback(function(){
    return "wrong uri";
});

