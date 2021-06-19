<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

/**
 * Admin Routing
 */

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

/**
 * Comments&Orders Routing
 */

Route::post('addComment', [CommentsController::class, 'store']);
Route::post('addOrder', [OrdersController::class, 'store']);
