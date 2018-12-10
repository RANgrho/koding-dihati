<?php

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
    return redirect('post');
});

Route::get('register', function () {
    return redirect('/auth/register');
});

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home'); */
/* Route::get('/post/create', 'PostController@create')->name('post.create'); */

// ======================================
// Memanggil semua route secara otomatis
// ======================================
Route::resource('post', 'PostController'); 
Route::resource('tag', 'TagController'); 
