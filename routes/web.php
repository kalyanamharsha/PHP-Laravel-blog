<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});/*
Route::get('/email', function () {
    Mail::To('tarangini.manne@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});
*/
Auth::routes();
Route::group(['middleware' => 'auth', 'prefix' => 'blog'], function () {
    Route::get('blogs', 'App\Http\Controllers\BlogController@index')->name('blog-component');
    Route::post('create_post', 'App\Http\Controllers\BlogController@createPost')->name('create_post');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
