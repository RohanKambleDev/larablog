<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
});

// Route::get('/', function () {
//     Route::get('posts', [PostController::class, 'index']);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->resource('post', PostController::class);
Route::middleware(['auth'])
    ->prefix('admin')
    ->resource('user', UserController::class);

Route::middleware(['auth'])
    ->controller(PostController::class)
    ->group(function () {
        Route::get('post', 'index')->name('post.index');
        Route::post('post', 'store')->name('post.store');
        // Route::middleware('can:edit articles')->get('post/create', 'create')->name('post.create');
        Route::get('post/create', 'create')->name('post.create');
        Route::get('post/{post:slug}', 'show')->name('post.show');
        Route::put('post/{post:slug}', 'update')->name('post.update');
        Route::delete('post/{post}', 'destroy')->name('post.destroy');
        Route::get('post/{post:slug}/edit', 'edit')->name('post.edit');
    });
