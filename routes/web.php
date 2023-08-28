<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('mainpage');
});
Route::get('/news', function (){
    return view('newsfeed', ['title' => 'Newsfeed']);
});
Route::get('/news/{uri}', function (string $uri){
    return view('news-detail', ['url' => $uri]);
});
Route::get('/welcome-laravel', function (){
    return view('welcome-laravel');
});