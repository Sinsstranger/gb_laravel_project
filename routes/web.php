<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{NewsController, NewsCategoryController};
use \App\Http\Controllers\Admin\{CategoryController as AdminCategoryController, NewsController as AdminNewsController, IndexController as AdminController};

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
    return view('mainpage', ['title' => 'Главная']);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/topics', [NewsCategoryController::class, 'index'])->name('topics');
Route::get('/news', [NewsController::class, 'index'])->name('newsfeed');
Route::get('/news/{uri}', [NewsController::class, 'show'])->name('news-detail');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
});
