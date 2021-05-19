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
});

Route::get('/hello/{name}', function ($name) {
    return '<h1 style="text-align: center">' . 'Hello, ' . $name . '</h1>';
});

Route::get('/about/', function () {
    return '<h1 style="text-align: center">' . 'About' . '</h1>';
});

Route::get('/news/', function () {
    return '<h1 style="text-align: center">' . 'News' . '</h1>';
});
