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
Route::namespace('Admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/login');

    // 管理者アカウントの操作は一部制限
    // @see vendor/laravel/ui/src/AuthRouteMethods.php
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'confirm'  => false,
        'verify'   => false,
    ]);

    Route::get('/home', 'HomeController@index')->name('home');
});
