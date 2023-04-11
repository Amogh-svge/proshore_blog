<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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




Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('blogs', BlogController::class);
    Route::resource('category', CategoryController::class);
    Route::get('dashboard', [ViewController::class, 'viewAdminIndexPage'])->middleware('verified')->name('dashboard');
});

require __DIR__ . '/auth.php';



Route::controller(ViewController::class)->name('view.')->group(function () {
    Route::get('/', 'homeView')->name('home');
    Route::get('/blog-detail/{slug}', 'blogView')->name('blog');

    Route::prefix('blog')->group(function () {
        Route::get('/allblogs', 'viewAllBlog')->name('allblogs');
        Route::get('/categories/{slug}', 'viewAllCategories')->name('category');
    });
});



Route::prefix('comment')->controller(CommentController::class)->name('comment.')->group(function () {
    Route::post('/store', 'storeComment')->name('store');
});
Route::controller(TagController::class)->group(function () {
});
