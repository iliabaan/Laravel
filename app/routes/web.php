<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ParserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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

Route::get('/', [NewsController::class, 'index']);

/**
 * News Routing
 */

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.showNews');

Route::get('/news/by_categories/{id}', [NewsController::class, 'by_categories'])
    ->where('id', '\d+')
    ->name('news.by_categories');

Route::get('order', [NewsController::class, 'order'])
    ->name('news.order');

Route::get('/parser', [ParserController::class, 'index'])
    ->name('admin.parser');
Route::post('/parser/get_news/', [ParserController::class, 'getNews']);

/**
 * Admin Routing
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is.admin']], function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/user', AdminUserController::class);
});

/**
 * Comments&Orders Routing
 */

Route::post('addComment', [CommentsController::class, 'store']);
Route::post('addOrder', [OrdersController::class, 'store']);

Auth::routes();

Route::get('auth/vk', [LoginController::class, 'loginVK'])->name('vkLogin');
Route::get('auth/vk/response', [LoginController::class, 'responseVK'])->name('responseVK');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
