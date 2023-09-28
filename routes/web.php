<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, NewsController, NewsCategoryController};
use \App\Http\Controllers\Admin\{CategoryController as AdminCategoryController, NewsController as AdminNewsController, IndexController as AdminController, UserController as AdminUserController};

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('mainpage');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [NewsCategoryController::class, 'index'])->name('topics');
    Route::get('/{url_slug}', [NewsCategoryController::class, 'show'])->name('topics-detail');

});
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('newsfeed');
    Route::get('/{url_slug}', [NewsController::class, 'show'])->name('news-detail');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('users', AdminUserController::class);
});

Auth::routes();
