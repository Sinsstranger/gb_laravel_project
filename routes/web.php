<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, NewsController, NewsCategoryController};
use \App\Http\Controllers\Admin\{CategoryController as AdminCategoryController, NewsController as AdminNewsController, IndexController as AdminController, UserController as AdminUserController};
use Laravel\Socialite\Facades\Socialite;
use \App\Http\Controllers\Auth\GithubAuthController;
use \App\Http\Controllers\Admin\ParserController;
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
    Route::get('/parser', ParserController::class)->name('parser');
    Route::get('/users/toggle_admin/{user}', [AdminUserController::class, 'toggleAdmin'])->name('toggleAdmin');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('users', AdminUserController::class);
});
// Маршрут для перенаправления пользователя на страницу аутентификации Github
Route::get('login/github', [GithubAuthController::class, 'redirectToProvider'])->name('login.github');

// Маршрут для получения данных пользователя из Github и создания или обновления пользователя в базе данных
Route::get('login/github/callback', [GithubAuthController::class, 'handleProviderCallback'])->name('login.github.callback');
Auth::routes();
