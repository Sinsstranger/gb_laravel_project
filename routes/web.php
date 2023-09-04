<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\NewsCategoryController;
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

Route::get('/', function () {
    return view('mainpage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/topics', [NewsCategoryController::class, 'index'])->name('topics');
Route::get('/news', [NewsController::class, 'index'])->name('newsfeed');
Route::get('/news/{uri}', [NewsController::class, 'show'])->name('news-detail');
