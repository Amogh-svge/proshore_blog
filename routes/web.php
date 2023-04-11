<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ViewController;
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



Route::resource('blogs', BlogController::class);
Route::resource('category', CategoryController::class);


Route::controller(ViewController::class)->name('view.')->group(function () {
    Route::get('/', 'homeView')->name('home');
    Route::get('/blog-detail/{slug}', 'blogView')->name('blog');

    Route::prefix('blog')->group(function () {
        Route::get('/allblogs', 'viewAllBlog')->name('allblogs');
        Route::get('/categories/{slug}', 'viewAllCategories')->name('category');
    });
});

Route::get('/admin', function () {
    return view('layout.admin_layout');
});



Route::prefix('comment')->controller(CommentController::class)->name('comment.')->group(function () {
    Route::post('/store', 'storeComment')->name('store');
});

Route::controller(TagController::class)->group(function () {
});
